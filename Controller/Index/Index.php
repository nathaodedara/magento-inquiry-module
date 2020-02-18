<?php
namespace Invigorate\Inquiry\Controller\Index;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
class Index extends Action {
    private $pageFactory;
    protected $_messageManager;
    protected $_inquiryRecordsDataFactory; //sdsdsd
    public function __construct(
        Context $context,
        PageFactory $pageFactory,
        \Magento\Framework\Message\ManagerInterface $messageManager,
        \Invigorate\Inquiry\Model\InquiryRecordsFactory $inquiryRecordsDataFactory //sdasd
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
        $this->_messageManager = $messageManager;
        $this->_inquiryRecordsDataFactory = $inquiryRecordsDataFactory; //sdsdsd
    }
    public function execute()
    {
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $post = (array) $this->getRequest()->getPost();
        $this->_view->loadLayout();
        $this->_view->getPage()->getConfig()->getTitle()->set(__('Inquiry Page'));
        $this->_view->renderLayout();
        if(!empty($post))
        {
            try{
                $inquiry_first_name = $post['first_name'];
                $inquiry_country = $post['country'];
                $inquiry_email = $post['email_address'];
                $inquiry_phone = $post['phone_number'];
                $inquiry_interested_in = $post['interested_area'];
                $inquiry_budget_limit = $post['budget_area'];
                $inquiry_message = $post['description_msg'];
                $error = 0;
                if($inquiry_first_name == '')
                {
                    $this->_messageManager->addError(__("First name is empty."));
                    $error = 1;
                }
                if($inquiry_country == '')
                {
                    $this->_messageManager->addError(__("Please select country."));
                    $error = 1;
                }
                if($inquiry_email == '')
                {
                    $this->_messageManager->addError(__("E-mail address is empty."));
                    $error = 1;
                }
                if($inquiry_phone == '')
                {
                    $this->_messageManager->addError(__("Phone number is empty."));
                    $error = 1;
                }
                if($inquiry_interested_in == '')
                {
                    $inquiry_interested_in = null;
                }
                if($inquiry_budget_limit == '')
                {
                    $inquiry_budget_limit = null;
                }
                if($inquiry_message == '')
                {
                    $this->_messageManager->addError(__("Please write a message."));
                    $error = 1;
                }
                if($error == 0)
                {
                    $model = $this->_inquiryRecordsDataFactory->create();
                    $model->setData('first_name', $inquiry_first_name);
                    $model->setData('country', $inquiry_country);
                    $model->setData('email', $inquiry_email);
                    $model->setData('phone', $inquiry_phone);
                    $model->setData('interested_in', $inquiry_interested_in);
                    $model->setData('budget_limit', $inquiry_budget_limit);
                    $model->setData('inquiry_message', $inquiry_message);
                    $model->save();
                    $this->_messageManager->addSuccess(__("Thank you for the inquiry, our team will get back to you shortly."));
                    $resultRedirect->setPath('inquiry');
                    return $resultRedirect;
                }
            }catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
    }
}
<?php
namespace Categories\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $service = $this->getServiceLocator()->get('category_service');
        $categories = $service->buildTree();
        return new ViewModel(array(
            'categories' => $categories,
        ));
    }
}

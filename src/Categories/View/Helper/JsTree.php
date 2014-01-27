<?php
namespace Categories\View\Helper;

use Zend\Form\View\Helper\AbstractHelper;

class JsTree extends AbstractHelper
{
    public function __invoke($categories, $divId = 'categories')
    {
        $json = array();
        foreach($categories as $cat) {
            $f = new \Categories\Formatter\JsTree();
            $json[] = $f->toJson($cat);
        }

        printf('<div id="%s"></div>', $divId);

        $this->getView()->headScript()->appendFile($this->getView()->basePath('assets/jstree/dist/jstree.min.js'));
        $this->getView()->headLink()->appendStylesheet($this->getView()->basePath('assets/jstree/dist/themes/default/style.min.css'));

        printf('<script>$("#%s").jstree({"core": {"data" : [%s]}});</script>', $divId, implode(', ', $json));
    }
} 
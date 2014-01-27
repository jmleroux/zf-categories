<?php
namespace Categories\Service;

use Categories\Entity\Category;
use DoctrineORMModule\Service\EntityManagerProviderInterface;
use DoctrineORMModule\Service\EntityManagerProviderTrait;

class CategoryService implements EntityManagerProviderInterface
{
    use EntityManagerProviderTrait;

    /**
     * @return array
     */
    public function buildTree()
    {
        $categories = $this->getAll();
        $tree = array();
        foreach ($categories as $cat) {
            if ($cat->getParent()) {
                $cat->getParent()->addChild($cat);
            } else {
                $tree[] = $cat;
            }
        }
        return $tree;
    }

    /**
     * @return Category[]
     */
    public function getAll()
    {
        $em = $this->getEntityManager();
        $repo = $em->getRepository('Categories\Entity\Category');
        return $repo->findBy(array(), array('parent' => 'asc'));
    }
}

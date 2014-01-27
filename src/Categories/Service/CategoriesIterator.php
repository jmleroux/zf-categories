<?php
namespace Categories\Service;

use ArrayIterator;
use Categories\Entity\Category;
use RecursiveIterator;

class CategoriesIterator extends ArrayIterator implements RecursiveIterator
{
    /**
     * @return bool
     */
    public function valid()
    {
        return $this->current() instanceof Category;
    }

    /**
     * @return bool
     */
    public function hasChildren()
    {
        $current = $this->current();

        if (!$current instanceof Category) {
            return false;
        }

        return $current->hasChildren();
    }

    /**
     * @return CategoriesIterator
     */
    public function getChildren()
    {
        return new CategoriesIterator($this->current()->getChildren());
    }
}

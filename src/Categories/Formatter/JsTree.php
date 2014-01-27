<?php
namespace Categories\Formatter;

use Categories\Entity\Category;

class JsTree
{

    /**
     * @param Category $category
     * @return string JsTree JSON format
     */
    public function toJson(Category $category)
    {
        return json_encode($this->toArray($category));
    }

    /**
     * Build recursive array from a root category
     * JsTree JSON format
     * @param Category $category
     * @return array
     */
    protected function toArray(Category $category)
    {
        $children = array();
        foreach ($category->getChildren() as $child) {
            $children[] = $this->toArray($child);
        }
        return array(
            'id' => $category->getId(),
            'text' => $category->getName(),
            'state' => array(
                'opened' => true,
                'disabled' => false,
                'selected' => false,
            ),
            'children' => $children,
        );
    }
}

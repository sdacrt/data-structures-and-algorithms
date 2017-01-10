<?php
/**
 * Singly linked list data structure.
 *
 * There are two parts to a singly linked list data structure. The
 * first part is the list itself. The second part are the elements of
 * the list.
 *
 * The list itself is made up of its elements. We can interact with a
 * given element by accessing that element directly, but in order to
 * access that element in the first place we first need to find it in
 * the list.
 *
 * To do this, we will define two PHP classes: one for the list, and
 * one for the list's elements.
 *
 * @file singly_linked_list_object_oriented.php Example implementation in Object-Oriented Programming style.
 *
 * @author Meitar "maymay" Moscovitz <meitarm+github@gmail.com>
 */

/**
 * Singly linked list.
 *
 * The singly linked list itself is the logical container for all the
 * list's elements. The list needs to know which element is the first
 * element. It does *not* need to know the order of the list items
 * themselves, because each element is responsible for knowing which
 * one comes after it.
 */
class Singly_Linked_List {

    /**
     * The first item.
     *
     * When first created, the Singly_Linked_List will have its
     * `$first` member variable set to `null` so that we know there
     * are no elements in the list.
     *
     * @var null|Singly_Linked_List_Element
     */
    public $first = null;

    /**
     * Adds an element to the end of the list.
     *
     * We need to be able to add elements to the list. To do that, we
     * make a method find the end of the list and then make a new
     * element there.
     *
     * @param mixed $value
     */
    public function appendElement ($value = null) {
        if ($this->first instanceof Singly_Linked_List_Element) {
            // If there are already elements in the list, we add the
            // new element to the end of the list by making the last
            // element's `$next` variable point to the new element.
            $last_element = $this->getLastElement();
            $last_element->next = new Singly_Linked_List_Element($value);
        } else {
            // Otherwise, if the first element is still null (which
            // is how we initialized it), we have an empty list, so
            // this element can go in the first spot.
            $this->first = new Singly_Linked_List_Element($value);
        }
    }

    /**
     * Find the element at the end of the list.
     *
     * @return null|Singly_Linked_List_Element
     */
    public function getLastElement () {
        // Start at the beginning of the list.
        $current_element = $this->first;

        // Examine each element to see if it knows about a next one.
        while (null !== $current_element->next) {
            // If it does, check that element next.
            $current_element = $current_element->next;
        }

        // When the examined element's `$next` member variable doesn't
        // know about a next element, it means that element is the
        // last one in the list, so we return it.
        return $current_element;
    }

}

/**
 * An element in a Singly_Linked_List.
 */
class Singly_Linked_List_Element {

    /**
     * The value of the element.
     *
     * @var mixed $value
     */
    public $value;

    /**
     * The next element in the list.
     *
     * @var Singly_Linked_List_Element
     */
    public $next;

    /**
     * Creates an element in a Singly Linked List.
     *
     * @param mixed $value The value of this element.
     * @param null|Singly_Linked_List_Element The next element in the list, or `null` to indicate the final element.
     */
    public function __construct ($value = null, $next = null) {
        $this->value = $value;
        $this->next = $next;
    }

}

// Let's put these items into a singly linked list.
$items = array('hairbrush', 'stuffed animal', 'blanket', 'cooking pot');

// Create the list.
$singly_linked_list = new Singly_Linked_List();

// We add each item to a list element, one after the other.
foreach ($items as $item) {
    $singly_linked_list->appendElement($item);
}

var_dump($singly_linked_list);
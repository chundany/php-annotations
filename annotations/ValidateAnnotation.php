<?php

/**
 * Specifies a custom validation callback method.
 */
class ValidateAnnotation extends ValidationAnnotationBase
{
  /**
   * @var mixed An object, a class-name, or a function name.
   */
  public $type;
  
  /**
   * @var string Optional, identifies a class/object method.
   */
  public $method=null;
  
  public function initAnnotation($properties)
  {
    $this->_map($properties, array('type', 'method'));
    
    parent::initAnnotation($properties);
    
    if (!isset($this->type))
      throw new AnnotationException('type property not set');
  }
  
  /**
   * @return mixed A standard PHP callback, e.g. an array($object, $method) pair, or a function name.
   */
  public function getCallback()
  {
    if ($this->method!==null)
      return array($this->type, $this->method);
    else
      return $this->type;
  }
}

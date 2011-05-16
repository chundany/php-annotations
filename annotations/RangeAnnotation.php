<?php

/**
 * Specifies validation against a minimum and/or maximum numeric value.
 */
class RangeAnnotation extends ValidationAnnotationBase
{
  /**
   * @var mixed $min Minimum numeric value (integer or floating point)
   */
  public $min=null;
  
  /**
   * @var mixed $max Maximum numeric value (integer or floating point)
   */
  public $max=null;
  
  public function initAnnotation($properties)
  {
    if (isset($properties[0]))
    {
      if (isset($properties[1]))
      {
        $this->min = $properties[0];
        $this->max = $properties[1];
        unset($properties[1]);
      }
      else
        $this->max = $properties[0];
      
      unset($properties[0]);
    }
    
    parent::initAnnotation($properties);
    
    if ($this->min!==null && !is_int($this->min) && !is_float($this->min))
      throw new AnnotationException('RangeAnnotation requires a numeric (float or int) min property');
    if ($this->max!==null && !is_int($this->max) && !is_float($this->max))
      throw new AnnotationException('RangeAnnotation requires a numeric (float or int) max property');
    
    if ($this->min===null && $this->max===null)
      throw new AnnotationException('RangeAnnotation requires a min and/or max property');
  }
}

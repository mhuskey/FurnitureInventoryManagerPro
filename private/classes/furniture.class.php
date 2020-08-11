<?php
  class Furniture {
    public $manufacturer;
    public $item;
    public $stock;
    public $category;
    public $cubes;
    public $price;
    
    protected $weight_lbs;
    
    public const CATEGORIES = [
      'Bedroom',
      'Dining Room',
      'Upholstery',
      'Recliner',
      'Occasional'
    ];
    
    public function __construct($args=[]) {
      $this->manufacturer = $args['manufacturer'] ?? '';
      $this->item         = $args['item']         ?? '';
      $this->stock        = $args['stock']        ??  0;
      $this->category     = $args['category']     ?? '';
      $this->weight_lbs   = $args['weight_lbs']   ?? 0.0;
      $this->cubes        = $args['cubes']        ?? 0.0;
      $this->price        = $args['price']        ?? 0.0;
    }
    
    public function weight_lbs() {
      return number_format($this->weight_lbs, 2) . ' lbs';
    }
    
    public function weight_kgs() {
      $weight_lbs = floatval($this->weight_lbs) * 0.45359237;
      return number_format($weight_lbs, 2) . ' kgs';
    }
  }
?>

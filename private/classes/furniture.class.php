<?php
  class Furniture extends DatabaseObject {
    static protected $table_name = 'furniture';
    static protected $db_columns = ['id', 'brand', 'item', 'stock', 'category', 'price', 'weight_lbs', 'cubes'];
    
    public $id;
    public $brand;
    public $item;
    public $stock;
    public $category;
    public $price;
    public $weight_lbs;
    public $cubes;
    
    public function __construct($args=[]) {
      $this->brand      = $args['brand']        ?? '';
      $this->item       = $args['item']         ?? '';
      $this->stock      = $args['stock']        ??  0;
      $this->category   = $args['category']     ?? '';
      $this->price      = $args['price']        ?? 0.0;
      $this->weight_lbs = $args['weight_lbs']   ?? 0.0;
      $this->cubes      = $args['cubes']        ?? 0.0;
    }
    
    public const CATEGORIES = [
      'Bedroom',
      'Dining Room',
      'Upholstery',
      'Recliner',
      'Occasional'
    ];
    
    public function weight_lbs() {
      return number_format($this->weight_lbs, 2) . ' lbs';
    }
    
    public function weight_kgs() {
      $weight_lbs = floatval($this->weight_lbs) * 0.45359237;
      return number_format($weight_lbs, 2) . ' kgs';
    }
    
    protected function validate() {
      $this->errors = [];
      
      if(is_blank($this->brand)) {
        $this->errors[] = 'Brand cannot be blank';
      }
      if(is_blank($this->item)) {
        $this->errors[] = 'Item cannot be blank';
      }
      if(is_blank($this->stock)) {
        $this->errors[] = 'Stock cannot be blank';
      }
      if(is_blank($this->category)) {
        $this->errors[] = 'Category cannot be blank';
      }
      if(is_blank($this->price)) {
        $this->errors[] = 'Price cannot be blank';
      }
      if(is_blank($this->weight_lbs)) {
        $this->errors[] = 'Weight cannot be blank';
      }
      if(is_blank($this->cubes)) {
        $this->errors[] = 'Cubes cannot be blank';
      }
      
      return $this->errors;
    }
  }
?>

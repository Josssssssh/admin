<?php

namespace App\Livewire;

use App\Models\Product; // Change to import the Product model
use Livewire\Component;
use Livewire\WithPagination;

class ProductTable extends Component
{
    use WithPagination;

    // Declare properties to bind with form inputs
    public $productName, $quantity, $price, $condition, $description;

    // Validation rules
    protected $rules = [
        'productName' => 'required|string|max:255',
        'quantity' => 'required|integer|min:1',
        'price' => 'required|numeric|min:0',
        'condition' => 'required|string',
        'description' => 'nullable|string',
    ];

    // Submit method to store a new product
    public function submit()
    {
        $this->validate();  // Validate the inputs

        // Create the new product
        Product::create([
            'product_name' => $this->productName,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'condition' => $this->condition,
            'description' => $this->description,
        ]);

        // Reset form inputs after submission
        $this->reset();

        // Set a success message in the session
        session()->flash('message', 'Product added successfully!');
    }

    // Render method to return the view
    public function render()
    {
        // Retrieve products with pagination
        $products = Product::paginate(5);  // Adjust the pagination number as needed
        return view('livewire.product-table', compact('products'));
    }
}

<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->slug(5),
            'large_photo_path' => 'Products/5cOgeISF0jxQpLV1BUE17cxRnI79qzyxMFW01Wzc.jpg',
            'small_photo_path' => 'Products/5cOgeISF0jxQpLV1BUE17cxRnI79qzyxMFW01Wzc.jpg',
            'is_active' => 1,
            'stock' => $this->faker->numberBetween($min = 2, $max = 100),
            'original_price' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'discounted_price' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'product_info' => '<p>ok</p>',
            'category_id' => $this->faker->numberBetween($min = 1, $max = 3),
        ];
    }
}

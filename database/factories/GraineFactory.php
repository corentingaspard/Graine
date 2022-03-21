<?php

namespace Database\Factories;

use App\Models\Graine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Graine>
 */
class GraineFactory extends Factory
{

    protected $model = Graine::class;

    const famille=['Solanacées', 'Cucurbitacées', 'Légumineuses'];

    const periodePlant=['éte', 'automne', 'printemps', 'hiver'];
    const periodeRecol=['éte', 'automne', 'printemps', 'hiver'];
    const visuel=["https://www.celnat.fr/wp-content/uploads/2017/09/shutterstock_268813280.jpg","https://image.shutterstock.com/image-photo/sesame-seeds-isolated-on-white-260nw-235905514.jpg",
        "https://www.valpibio.com/wp-content/uploads/2015/01/graines-oleagineuses-inside.jpg"];
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'=>$this->faker->words(2, true),
            'famille'=>$this->faker->randomElement(self::famille),
            'periode_plantation'=>$this->faker->randomElement(self::periodePlant),
            'periode_recolte'=>$this->faker->randomElement(self::periodeRecol),
            'conseil'=>$this->faker->text(250),
            'visuel'=>$this->faker->randomElement(self::visuel),
            'quantite'=>$this->faker->numberBetween(1,10000),
        ];
    }
}

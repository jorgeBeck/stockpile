<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ItemSeeder::class);
        $this->call(MachineSeeder::class);
        $this->call(EntryListSeeder::class);
        $this->call(EntrySeeder::class);

        // Model::reguard();
    }
}

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('items')->insert([
        'name' => 'Flecha XL No. 1',
        'photo' => 'sdf',
        'description' => 'La Flecha XL No. 1 es la pieza encargada de Lorem ipsum dolor sit amet, consectetur adipisicing elit. Glacius Repellendus eius amet ab, nam.',
        'in_stock' => 8,
        'minimum_limit' => 3,
        'minimum' => 5,
        'maximum' => 50,
      ]);
      DB::table('items')->insert([
        'name' => 'Flecha XL No. 2',
        'photo' => 'sdf',
        'description' => 'La Flecha XL No. 2 es la Laborum quibusdam consequatur laboriosam, minus consequuntur at itaque quae quaerat soluta sabrewulf.',
        'in_stock' => 2,
        'minimum_limit' => 3,
        'minimum' => 5,
        'maximum' => 50,
      ]);
      DB::table('items')->insert([
        'name' => 'Corona L No. 5',
        'photo' => 'sdf',
        'description' => 'La Corona 10in encaja en Possimus reprehenderit quos alias, recusandae aperiam nobis. Eyedol qui accusantium tenetur.',
        'in_stock' => 5,
        'minimum_limit' => 3,
        'minimum' => 5,
        'maximum' => 50,
      ]);
      DB::table('items')->insert([
        'name' => 'Satélites L No. 3',
        'photo' => 'sdf',
        'description' => 'Los satélites XL encajan perfectamente en Lorem ipsum dolor sit amet, consectetur combo oh uhoh adipisicing elit, qui accusantium tenetur, Eum nam animi error.',
        'in_stock' => 10,
        'minimum_limit' => 3,
        'minimum' => 5,
        'maximum' => 50,
      ]);
    }
}

class MachineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('machines')->insert([
        'name' => 'Molde F1',
        'description' => 'La máquina molde modelo F1 Ipsa soluta odio expedita voluptas excepturi officia quis consequatur cinder nisi quam numquam? Eum animi error quasi ipsa, ut sed adipisci repudiandae, quaerat?',
      ]);
      DB::table('machines')->insert([
        'name' => 'Molde F2',
        'description' => 'La máquina molde modelo F2 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus fulgore quis amet similique quas architecto deleniti sed mollitia exercitationem aliquam, voluptatibus minus fugit beatae molestias earum cum, veniam molestiae dolorum sunt!',
      ]);
      DB::table('machines')->insert([
        'name' => 'Molde F3',
        'description' => 'La máquina molde modelo F3 Temporibus fulgore quis amet similique quas architecto deleniti sed mollitia exercitationem aliquam, voluptatibus minus fugit beatae molestias earum cum, veniam molestiae dolorum sunt!',
      ]);
    }
}

class EntryListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('entries_list')->insert([
        'turn' => 'Turno 123',
        'comment' => 'Un comentario sobre la hoja de entrega de material',
        'created_at' => '2017-04-27 10:01:28',
      ]);
      DB::table('entries_list')->insert([
        'turn' => 'Turno 456',
        'comment' => 'Otro comentario sobre la hoja de entrega de material',
        'created_at' => '2017-04-27 10:01:28',
      ]);
    }
}

class EntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('entries')->insert([
        'entry_id' => 1,
        'item_id' => 4,
        'machine_id' => 1,
        'description' => 'Se entregaron 10 items 4 fabricados en la maquina 1',
        'quantity' => 10,
      ]);
      DB::table('entries')->insert([
        'entry_id' => 1,
        'item_id' => 1,
        'machine_id' => 1,
        'description' => 'Se entregaron 5 items 1 fabricados en la maquina 1',
        'quantity' => 5,
      ]);
      DB::table('entries')->insert([
        'entry_id' => 2,
        'item_id' => 1,
        'machine_id' => 2,
        'description' => 'Se entregaron 3 items 1 fabricados en la maquina 2',
        'quantity' => 3,
      ]);
      DB::table('entries')->insert([
        'entry_id' => 2,
        'item_id' => 2,
        'machine_id' => 2,
        'description' => 'Se entregaron 4 items 2 fabricados en la maquina 2',
        'quantity' => 4,
      ]);
      DB::table('entries')->insert([
        'entry_id' => 2,
        'item_id' => 3,
        'machine_id' => 2,
        'description' => 'Se entregaron 2 items 3 fabricados en la maquina 2',
        'quantity' => 2,
      ]);
    }
}

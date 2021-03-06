<?php

use Illuminate\Database\Seeder;
use App\Realms\Realm;
use App\Realms\Player;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the servers table with a example Potatocraft server.
     */
    public function seedServers()
    {
        // Create a Potatocraft entry.
        Realm::create([
            'address' => 'us.mineplex.com',
            'state' => Realm::STATE_OPEN,
            'name' => 'Potatocraft',
            'days_left' => 365,
            'expired' => false,
            'invited_players' => [
                new Player('b6284cef69f440d2873054053b1a925d', 'mitchfizz05'),
                new Player('27cf5429ec01499a9edf23b47df8d4f5', 'mindlux'),
                new Player('061e5603aa7b4455910a5547e2160ebc', 'Spazzer400'),
                new Player('0c9f23fb2e8f48cf99895d940b45bda8', 'harmjan123'),
            ],
            'operators' => [
                new App\Realms\Player('b6284cef69f440d2873054053b1a925d', 'mitchfizz05')
            ],
            'minigames_server' => false,
            'motd' => 'Potatoes have lots of calories.',
            'owner' => new Player('b6284cef69f440d2873054053b1a925d', 'mitchfizz05')
        ]);
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->seedServers();
    }
}

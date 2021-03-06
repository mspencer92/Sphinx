<?php

namespace App\Realms;

use Illuminate\Database\Eloquent\Model;

/**
 * Invite model.
 *
 * @property int $id Invitation ID
 * @property int $realm_id ID of Realm the invite is for.
 * @property Player $to The player the invite was sent to.
 */
class Invite extends Model
{
    protected $guarded = [];

    protected function getDateFormat()
    {
        return 'U';
    }

    /**
     * Server relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function realm()
    {
        return $this->belongsTo('App\Realms\Realm', 'realm_id', 'id');
    }

    /**
     * Mutator for to attribute, encodes player objects into json.
     *
     * @param $value
     * @return string
     */
    public function setToAttribute($value)
    {
        $this->attributes['to'] = json_encode([
            'uuid' => $value->uuid,
            'username' => $value->username
        ]);
    }

    /**
     * Accessor for to attribute, decodes player objects from json.
     *
     * @param $value
     * @return Player
     */
    public function getToAttribute($value)
    {
        $playerJson = json_decode($value);
        return new Player(
            $playerJson->uuid,
            $playerJson->username
        );
    }
}

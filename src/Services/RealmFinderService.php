<?php

namespace OpenDominion\Services;

use Atrox\Haikunator;
use DB;
use OpenDominion\Factories\DominionFactory;
use OpenDominion\Factories\RealmFactory;
use OpenDominion\Models\Race;
use OpenDominion\Models\Realm;
use OpenDominion\Models\Round;
use OpenDominion\Repositories\RealmRepository;

class RealmFinderService
{
    /** @var RealmRepository */
    protected $realms;

    /**
     * RealmService constructor.
     *
     * @param RealmRepository $realms
     */
    public function __construct(RealmRepository $realms)
    {
        $this->realms = $realms;
    }

    /**
     * Finds and returns the first best realm for a new Dominion to settle in.
     *
     * Up to 12 Dominions can exist in a realm.
     *
     * @see DominionFactory::create()
     *
     * @param Round $round
     * @param Race $race
     *
     * @return Realm|null
     */
    public function findRandom(Round $round, Race $race)
    {
        // todo: figure out how to do this with repositories
        $results = DB::table('realms')
            ->select('realms.*', DB::raw('COUNT(dominions.id) AS dominion_count'))
            ->leftJoin('dominions', function ($join) use ($round) {
                $join->on('dominions.realm_id', '=', 'realms.id')
                    ->where('dominions.round_id', '=', $round->id);
            })
            ->where('realms.round_id', $round->id)
            ->where('realms.alignment', $race->alignment)
            ->groupBy('realms.id')
            ->having('dominion_count', '<', 12)
            ->orderBy('dominion_count')
            ->limit(1)
            ->get();

        if ($results->isEmpty()) {
            return null;

        }

        // todo: repositories!!
        $realmId = $results->first()->id;

        /** @var Realm $realm */
        $realm = Realm::findOrFail($realmId);
        return $realm;
    }
}

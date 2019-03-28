<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use App\Repositories\TerritoryRepository;

class TerritoryController extends Controller
{
    /**
     * @var TerritoryRepository
     */
    private $territoryRepository;

    /**
     * TerritoryController constructor.
     * @param TerritoryRepository $territoryRepository
     */
    public function __construct(TerritoryRepository $territoryRepository)
    {
        $this->territoryRepository = $territoryRepository;
    }

    public function show(Territory $territory)
    {
        return response()->json($territory);
    }

    public function nested($id)
    {
        $items = $this->territoryRepository->getNested($id);

        return ($items->isNotEmpty())
            ? view('templates.territory-items-options', compact('items'))
            : response()->json([], 204);
    }
}

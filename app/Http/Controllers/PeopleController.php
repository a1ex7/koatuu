<?php

namespace App\Http\Controllers;

use App\Http\Requests\PeopleStoreRequest;
use App\Models\People;
use App\Models\Territory;
use App\Repositories\TerritoryRepository;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    /**
     * @var TerritoryRepository
     */
    private $territoryRepository;

    /**
     * PeopleController constructor.
     * @param TerritoryRepository $territoryRepository
     */
    public function __construct(TerritoryRepository $territoryRepository)
    {
        $this->territoryRepository = $territoryRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = $this->territoryRepository->getRegionsList();

        return view('people.create', compact('regions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PeopleStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PeopleStoreRequest $request)
    {
        $people = People::firstOrCreate(
            [
                'email' => $request->input('email')
            ],
            $request->validated()
        );

        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'payload' => [
                    'id' => $people->id
                ]
            ]);
        }

        return redirect()->route('peoples.show', $people);
    }

    /**
     * Display the specified resource.
     *
     * @param People $people
     * @return \Illuminate\Http\Response
     */
    public function show(People $people)
    {
        $people->load('territory');

        return view('people.show', compact('people'));
    }
}

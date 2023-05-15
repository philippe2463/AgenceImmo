<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SearchPropertyRequest;
use App\Http\Requests\PropertyContactRequest;
use App\Mail\PropertyContactMail;

class PropertyController extends Controller
{
    public function index(SearchPropertyRequest $request): View
    {
        $query = Property::query()->orderBy('created_at', 'desc');
        if($request->validated('price'))
        {
            $query = $query->where('price', '<=', $request->validated('price'));
        }
        if ($request->validated('surface')) {
            $query = $query->where('surface', '>=', $request->validated('surface'));
        }
        if ($request->validated('rooms')) {
            $query = $query->where('rooms', '>=', $request->validated('rooms'));
        }
        if ($request->validated('title')) {
            $query = $query->where('title', 'like', "%{$request->validated('title')}%");
        }
        return view('property.index', [
            'properties' => $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property)
    {
        $expectedSlug = $property->getSlug();
        if($slug !== $expectedSlug)
        {
            return to_route('property.show', ['$lug' => $expectedSlug, 'property' => $property]);
        }

        return view('property.show', ['property' => $property]);
    }

    public function contact(Property $property, PropertyContactRequest $request)
    {
        Mail::send(new PropertyContactMail($property, $request->validated()));
        return back()->with('success', 'Votre demande a bien été envoyée');
    }
}

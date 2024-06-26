<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Mail\PropertyContactMail;
use App\Events\ContactRequestEvent;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Models\User;
use App\Notifications\ContactRequestNotification;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request) {
        $query = Property::query()->orderBy("created_at","desc");
        if($price = $request->validated('price')) {
            $query = $query->where('price','<=', $price);
        }
        if($surface = $request->validated('surface')) {
            $query = $query->where('surface','>=', $surface);
        }
        if($rooms = $request->validated('rooms')) {
            $query = $query->where('rooms','>=', $rooms);
        }
        if($title = $request->validated('title')) {
            $query = $query->where('title','like', "%{$title}%");
        }
        return view('property.index',[
            'properties'=> $query->paginate(16),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property) {
        $expectedslug = $property->getSlug();
        if($slug !== $expectedslug) {
            return to_route('property.show',[ 'slug' => $expectedslug, 'property' => $property ]);
        }

        return view('property.show',[
            'property' => $property
        ]);
    }

    public function contact(Property $property, PropertyContactRequest $request) {
        /** @var User $user **/
        $user = User::first();
        $user->notify(new ContactRequestNotification($property, $request->validated()));
        return back()->with('success','Votre demande de contact a bien ete envoyer');
    }
}
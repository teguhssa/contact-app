<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{

    /**
     * Display a listing of the contacts.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all contacts from the database
        $contacts = Contact::all();

        // Count the total number of contacts
        $totalContacts = Contact::count();

        // Return the index view with contacts data and totalContacts
        return view('index', compact('contacts', 'totalContacts'));
    }

    /**
     * Show the form for creating a new contact.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Display the form for adding a new contact
        return view('contact.add');
    }

    /**
     * Display the specified contact.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Fetch the contact information based on ID
        $contact = Contact::find($id);

        // Display the detail page for the contact
        return view('contact.detail', compact('contact'));
    }


    /**
     * Store a newly created contact in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required',
            'address' => 'required',
        ]);

        // If validation fails, redirect back with error messages
        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        // Create a new contact record in the database
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phoneNumber,
            'address' => $request->address
        ]);

        // Redirect to the index page with success message
        return redirect()->route('contact.index')->with('success', 'Contact Added!');
    }


    /**
     * Show the form for editing the specified contact.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Fetch the contact information based on ID for editing
        $contact = Contact::find($id);

        // Display the form for editing the contact
        return view('contact.edit', compact('contact'));
    }


    /**
     * Update the specified contact in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phoneNumber' => 'required',
            'address' => 'required',
        ]);

        // If validation fails, redirect back with error messages
        if ($validator->fails()) {
            $errors = $validator->errors();
            return back()->with('errors', $errors)->withInput($request->all());
        }

        // Update the existing contact information in the database
        $contact = Contact::find($id);
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_number = $request->phoneNumber;
        $contact->address = $request->address;
        $contact->save();

        // Redirect to the index page with success message
        return redirect()->route('contact.index')->with('success', 'Contact Updated!');
    }


    /**
     * Remove the specified contact from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        // Delete the contact based on ID from the database
        $contact = Contact::find($id);
        $contact->delete();

        // Redirect to the index page with success message
        return redirect()->route('contact.index')->with('success', 'Contact Deleted!');
    }
}

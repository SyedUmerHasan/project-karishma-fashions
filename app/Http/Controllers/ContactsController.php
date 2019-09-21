<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacts;

class ContactsController extends Controller
{
    
    public function index()
    {
        $users = Contacts::select('contact_id', 'contact_name', 'contact_city', 'contact_province', 'contact_number1', 'contact_number2', 'contact_address')->get();
        return view("admin.admin_pages.list_products")->with(compact('users'));
        // return view("admin.admin_pages.list_products");
    }
    public function CreateContacts()
    {
        return view('admin.admin_pages.create_contacts');
    }
    public function EditContacts($contactid)
    {
        $mycontact = Contacts::where('contact_id',$contactid)->first();
        if($mycontact == null)
        {
            $errors = ['No Contact Exist'];
            return redirect()->route('ContactList')->with(compact('errors'));
        }
        return view('admin.admin_pages.edit_contacts')->with(compact('mycontact'));
    }
    public function AddContacts(Request $request)
    {
        if ($request->isMethod('post')) {
            $mycontact = new Contacts;
            $mycontact->contact_name = $request->ContactName;
            $mycontact->contact_city = $request->City;
            $mycontact->contact_province = $request->Province;
            $mycontact->contact_number1 = $request->ContactNumber1;
            $mycontact->contact_number2 = $request->ContactNumber2;
            $mycontact->contact_address = $request->Address;
            $mycontact->save();
            $errors = ['Contact has been successfully added'];
            return redirect()->route('ContactList')->with(compact('errors'));
        }
        else{
            back();
        }
    }
    public function DeleteContact($contactid)
    {
        Contacts::where('contact_id',$contactid)->delete();
        $errors = ['Contact has been successfully Deleted'];
        return redirect()->route('ContactList')->with(compact('errors'));
    }

    
}

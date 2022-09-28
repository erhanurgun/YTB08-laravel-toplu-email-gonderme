<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Validation\Validator;

class ManagementController extends Controller
{
    public function index()
    {
        return view('include.home');
    }

    public function addCustomer()
    {
        return view('include.add-customer');
    }

    public function addCustomerPost(Request $request)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email:rfc,dns|unique:customers',
            'telephone' => 'required|unique:customers',
        ], [
            'full_name.required' => 'Lütfen ad alanını doldurunuz!',
            'email.required' => 'Lütfen e-posta alanını doldurunuz!',
            'telephone.required' => 'Lütfen telefon alanını doldurunuz!',
            'email.unique' => 'Lütfen farklı bir e-posta giriniz!',
            'telephone.unique' => 'Lütfen faklı bir telefon giriniz!',
        ]);

        Customer::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'telephone' => $request->telephone
        ]);

        return redirect()->route('add-customer')->withSuccess('Müşteri bilgisi başarılı bir şekilde eklendi');
    }

    public function customerList()
    {
        $customers = Customer::all();
        return view('include.customer-list', compact('customers'));
    }

    public function editCustomer($id)
    {
        $customer = Customer::whereId($id)->first();
        if ($customer) {
            return view('include.edit-customer', compact('customer'));
        } else {
            return redirect()->route('customers');
        }
    }

    public function editCustomerPost(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email:rfc,dns',
            'telephone' => 'required',
        ], [
            'full_name.required' => 'Lütfen ad alanını doldurunuz!',
            'email.required' => 'Lütfen e-posta alanını doldurunuz!',
            'telephone.required' => 'Lütfen telefon alanını doldurunuz!',
        ]);

        Customer::whereId($id)->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'telephone' => $request->telephone
        ]);

        return redirect()->route('customers')->withSuccess('Müşteri bilgisi başarılı bir şekilde düzenlendi');
    }

    public function deleteCustomer($id)
    {
        $customer = Customer::whereId($id)->first();
        if ($customer) {
            Customer::whereId($id)->delete();
        }
        return redirect()->route('customers')->withSuccess('Müşteri silme işlemi bir şekilde gerçekleşti');
    }
}

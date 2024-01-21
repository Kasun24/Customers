<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;

class Customers extends Component
{
    public $customers, $name, $nic, $tel, $gender, $like, $remarks, $customer_id;
    public $updateMode = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function render()
    {
        $this->customers = Customer::latest()->get();
        return view('livewire.customers');
    }

    /**
     * Reset input fields.
     */
    private function resetInputFields()
    {
        $this->name = '';
        $this->nic = '';
        $this->tel = '';
        $this->gender = '';
        $this->like = '';
        $this->remarks = '';
    }

    /**
     * Store a new customer.
     */
    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'nic' => [
                'required',
                'regex:/^[0-9]{9}[vVxX]$/',
                'unique:customers',
            ],
            'tel' => 'required|regex:/^[0-9]{10}$/|unique:customers',
            'gender' => 'required',
            'like' => 'required',
            'remarks' => 'nullable',
        ]);

        Customer::create($validatedData);

        session()->flash('message', 'Customer Created Successfully.');

        $this->resetInputFields();
    }

    /**
     * Edit an existing customer.
     *
     * @param  int  $id
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $this->customer_id = $id;
        $this->name = $customer->name;
        $this->nic = $customer->nic;
        $this->tel = $customer->tel;
        $this->gender = $customer->gender;
        $this->like = $customer->like;
        $this->remarks = $customer->remarks;

        $this->updateMode = true;
    }

    /**
     * Cancel the edit mode.
     */
    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    /**
     * Update an existing customer.
     */
    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'nic' => [
                'required',
                'regex:/^[0-9]{9}[vVxX]$/',
                'unique:customers,nic,' . $this->customer_id,
            ],
            'tel' => 'required|regex:/^[0-9]{10}$/|unique:customers,tel,' . $this->customer_id,
            'gender' => 'required',
            'like' => 'required',
            'remarks' => 'nullable',
        ]);

        $customer = Customer::find($this->customer_id);
        $customer->update($validatedData);

        $this->updateMode = false;

        session()->flash('message', 'Customer Updated Successfully.');
        $this->resetInputFields();
    }

    /**
     * Delete a customer.
     *
     * @param  int  $id
     */
    public function delete($id)
    {
        Customer::find($id)->delete();
        session()->flash('message', 'Customer Deleted Successfully.');
    }
}

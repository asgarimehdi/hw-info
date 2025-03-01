<div>
    <select wire:model="testValue" class="form-control">
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
    </select>
    <p>مقدار انتخاب‌شده: {{ $testValue }}</p>
</div>
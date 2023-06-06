<div>
    @section('plugins.Select2', true)
   {{$program}}{{$specialization}}{{$staff}}
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-input placeholder="Not defined" wire:model="faculty" name="faculty" label="Faculty" style="width: 100%" disabled/>
        </div>
        <div class="col-md-6">
            <x-adminlte-input placeholder="Not defined" wire:model="department" name="department" label="Department" style="width: 100%" disabled/>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <x-adminlte-select2 label="Program of study" style="width: 100%" wire:model="program" id="program" name="program">
                <option default>Please select your program of study</option>
                @foreach ($programs as $index => $program)
                    <option value="{{$program->id}}"><b>{{$program->code}}</b>-{{$program->description}}</option>
                @endforeach
            </x-adminlte-select2>
        </div>  
        <div class="col-md-5">
            <x-adminlte-select2 label="Specialization" style="width: 100%" wire:model="specialization" id="specialization" name="specialization">
                <option default>Please select your specialization</option>
                @foreach ($specializations as $index => $specialization)
                    <option value="{{$specialization->id}}"><b>{{$specialization->data->abbrev}}</b>-{{$specialization->data->description}}</option>
                @endforeach
            </x-adminlte-select2>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-6">
            <x-adminlte-select2 label="Supervisor" style="width: 100%" wire:model="staff" id="staff" name="staff">
                <option default>Please select your supervisor</option>
                @foreach ($staffs as $index => $staff)
                    <option value="{{$staff->id}}">{{$staff->first_name}} {{$staff->last_name}} {{$staff->front_title}}, {{$staff->rear_title}}</option>
                @endforeach
            </x-adminlte-select2>
        </div>
    </div>  
    

    @push('scripts')
    <script>
        //var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function () {
            $('#program').on('change', function (e) {
                let dataProgram = $(this).val();
                @this.set('program', dataProgram);
                //console.log('here');
                window.livewire.emit('selectProgram');
            });
           
            $('#specialization').on('change', function (e) {
                let dataSpecialization = $(this).val();
                @this.set('specialization', dataSpecialization);
                window.livewire.emit('selectSpecialization');
                //console.log('here');
            });
            $('#staff').on('change', function (e) {
                let dataStaff = $(this).val();
                @this.set('staff', dataStaff);
                window.livewire.emit('selectStaff');
                //console.log('here');
            });

            window.livewire.on('reloadSelectSpecialization',()=>{
                $('#specialization').select2('destroy');
                 $('#specialization').select2();
            });
            window.livewire.on('reloadSelectStaff',()=>{
                $('#staff').select2('destroy');
                $('#staff').select2();
            });
            window.livewire.on('reloadSelectProgram',()=>{
                $('#program').select2('destroy');
                $('#program').select2();
            });

        });
    </script>
@endpush
</div>

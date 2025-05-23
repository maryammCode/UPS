 @include('intranet.layouts.css')
 <div class="container">
     <div class="row">
         <table class="table">
             <thead style="font-weight: 600;">
                 <tr>
                     <th>@lang('intranet.Ordre')</th>
                     <th>@lang("intranet.Numéro d'inscription")</th>
                     {{-- <th>@lang('intranet.Cin')</th> --}}
                     <th>@lang('intranet.Nom')</th>
                     <th>@lang('intranet.Prénom')</th>
                 </tr>
             </thead>
             <tbody>
                 @php
                     $order = 0;
                 @endphp
                 @foreach ($group_td->students as $student)
                     @php
                         $order = $order + 1;
                     @endphp
                     <tr>
                         <th>{{ $order }}</th>
                         <th>{{ $student->numero_inscription }}</th>
                         {{-- <th>{{ $student->cin }}</th> --}}
                         <th>{{ $student->nom }}</th>
                         <th>{{ $student->prenom }}</th>
                     </tr>
                 @endforeach
             </tbody>
         </table>
     </div>
 </div>

 <script>
    window.print()
 </script>


@extends('voyager::master')

@section('content')
    <div class="panel panel-bordered" style="margin : 30px; padding : 30px">
        <h3>Tableau de traduction</h3>

        <form action="{{ route('voyager.translation_intranet.save', ['lang' => $lang]) }}" method="POST">
            @csrf
            <table class="table" id="translations-table">
                <thead>
                    <tr>
                        <th>Clé</th>
                        <th>Valeur</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($translations as $translation)
                        <tr>
                            <td>{{ $translation['key'] }}</td>
                            <td>
                                <div class="form-group">
                                    <div class="controls">
                                        <input style="width: 100%;" type="text"
                                            name="translations[{{ $translation['key'] }}]"
                                            value="{{ $translation['value'] }}">
                                    </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" id="add-translation">Ajouter une nouvelle traduction</button>

            <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('add-translation').addEventListener('click', function () {
                var tableBody = document.getElementById('translations-table').getElementsByTagName('tbody')[0];
                var newRow = tableBody.insertRow();
                var cell1 = newRow.insertCell(0);
                var cell2 = newRow.insertCell(1);
                cell1.innerHTML = '<input type="text" name="new_translations[key][]" placeholder="Nouvelle clé">';
                cell2.innerHTML = '<input type="text" name="new_translations[value][]" placeholder="Nouvelle valeur">';
            });
        });
    </script>
@endsection

<h3>Fornecedor</h3>

{{-- comentario no blade --}}

@php
    //comentario escrito no bloco de php puro
    /*
        PHP PURO
    */
@endphp

@isset($fornecedores)
        @forelse ($fornecedores as $indice=>$fornecedor)
            Fornecedor: {{ $fornecedor['nome'] }}
            <br>
            Status: {{ $fornecedor['status'] }}
            <br>
            CNPJ: {{ $fornecedor['cnpj'] ?? 'Dado não preenchido'}}
            <br>
            Telefone: ( {{ $fornecedor['ddd'] ?? '' }} )  {{ $fornecedor['telefone'] ?? '' }}
            @switch($fornecedor['ddd'])
                @case('11')
                    São Paulo - SP
                    @break
                @case('51')
                    Porto Alegre - RS
                    @break
                @case('85')
                    Fortaleza - CE
                    @break
                @default
                    Estado não identificado.
            @endswitch
        <br>
        <hr>
        @empty
            Não existem fornecedores cadastrados!
        @endforelse
@endisset
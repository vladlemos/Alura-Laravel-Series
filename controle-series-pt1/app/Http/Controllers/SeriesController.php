<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;

class SeriesController {

    public function index(Request $request){
        $series = Serie::query()
            ->orderBy('nome')
            ->get();

        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));

        // $series = Serie::all(); lista tudo
        // var_dump($series);

        // $series = [
        //     'GoT',
        //     'Breakin Bad',
        //     'Black Mirror'
        // ];

        // $html = '<ul>';

        //     foreach ($series as $serie) {
        //         $html .= "<li> $serie </li>";
        //     }

        // $html .= '</ul>';

        // return $html;
        // responsabilidade colocada na view;

    //   return view('series.index', [
    //       'series' => $series
    //     //   compact('series') sem abertura do array, pois tem o mesmo nome;
    //   ]);



    }

    public function create()
    {
        return view('series.create');

    }

    public function store(SeriesFormRequest $request){



        // $nome = $request->get('nome'); ele entende como __get no jeito abaixo
        $nome = $request->nome;
        // $serie = new Serie();
        // $serie->nome = $nome;
        // var_dump($serie->save()); nao precisa instanciar

        // tem que mexer na model Series para nao dar pau
        // para preenchimento em massa
        // $serie = Serie::create([
        //     'nome' => $nome
        // ]);
        // echo "Série com id {$serie->id} criada: {$serie->nome}";

        $serie = Serie::create($request->all());



        $request->session()
            ->flash(
                'mensagem',
                "Série {$serie->id} criada com sucesso: {$serie->nome}"
            );
            // ->put(
            //     'mensagem',
            //     "Série {$serie->id} criada com sucesso: {$serie->nome}"
            // );`
        // return redirect('/series');
        return redirect()->route('listar_series');

    }

    public function destroy(Request $request){

       Serie::destroy($request->id);

       $request->session()
            ->flash(
                'mensagem',
                "Série excluida com sucesso"
            );

        // return redirect('/series');
        return redirect()->route('listar_series');

    }


}

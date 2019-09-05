<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Interfaces\ResourceControllerInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;

abstract class AbstractController extends Controller implements ResourceControllerInterface
{
    /**
     * @var string
     */
    protected $label = '';

    /**
     * @return Model
     */
    abstract protected function getModel();

    /**
     * @return array
     */
    abstract protected function getValidationConfig();

    /**
     * @param $path
     * @return string
     */
    function getView($path)
    {
        return $this->getViewPath() . '.' . $path;
    }

    /**
     * @return string
     */
    protected function getViewPath()
    {
        return Str::plural(str_replace(' ', '', Str::lower($this->label)));
    }

    /**
     * @return string
     */
    protected function getRoute()
    {
        return '/' . Str::plural(str_replace(' ', '', Str::lower($this->label)));
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $models = ($this->getModel())::all();
        return view($this->getView('index'), compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view($this->getView('create'), [
            'route' => $this->getViewPath(),
            'label' => $this->label
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate($this->getValidationConfig());
        $this->createFromRequest($request);
        return redirect($this->getRoute())
            ->with('success', $this->label . ' Created!');
    }

    /**
     * @param Request $request
     */
    protected function createFromRequest(Request $request)
    {
        ($this->getModel())::create($this->parseData($request->all()));
    }

    /**
     * @param array $data
     * @return array
     */
    protected function parseData($data = [])
    {
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $model = ($this->getModel())::find($id);
        return view($this->getView('show'), compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $model = ($this->getModel())::find($id);
        return view($this->getView('edit'), [
            'route' => $this->getViewPath(),
            'label' => $this->label,
            'model' => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // validate
        $request->validate($this->getValidationConfig());

        // update
        $this->updateByIdFromRequest($request, $id);

        //
        return redirect($this->getRoute())
            ->with('success', $this->label . ' Updated!');
    }

    protected function updateByIdFromRequest(Request $request, $id)
    {
        /** @var Model $model */
        $model = ($this->getModel())::findOrFail($id);
        $model->update($this->parseData($request->all()));
        $model->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var Model $model */
        $model = ($this->getModel())::find($id);
        $model->delete();

        return redirect($this->getRoute())
            ->with('success', $this->label . ' Deleted!');
    }
}

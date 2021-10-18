<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function create(){
        $users = User::all();
        $cate = Category::all();
        return view('admin.item.create',[
            'users' => $users,
            'cate' => $cate
        ]);
    }
    public function index(){
        $data = Item::latest()->paginate(20);

        return view('admin.item.index',['data' => $data]);
    }
    public function store(Request $request){

       $item = new Item();
       $item->name = $request->input('name');
       $item->slug = $request->input('slug');
       $item->price = $request->input('price');
       $item->stock = $request->input('stock');
       $item->user_id = $request->input('user_id');
       $item->category_id = $request->input('category_id');

       $item->is_active = $request->input('is_active');

       $item->save();

       return redirect()->route('item.index');
    }
    public function edit($id)
    {
        $item = Item::findorFail($id);
        $category = Category::all();

        return view('admin.item.edit',[
            'category' => $category,
            'item' => $item,
        ]);
    }
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
        ]);

        $item = Item::findorFail($id);
        $item->name = $request->input('name');
        $item->slug = str_slug($request->input('name'));
        $item->stock = $request->input('stock');
        $item->price = $request->input('price');
        $item->category_id = $request->input('category_id');
        $item->is_active = $request->input('is_active');
        $item->save();

        return redirect()->route('item.index');
    }
    public function destroy($id)
    {
        Item::where('id', $id)->delete();

        return redirect()->route('item.index');
    }
    public function search(Request $request){
        $keyword = $request->input('tu-khoa');
        $data = [];
        $data = User::where(['name', 'like', '%' . $keyword . '%'])
                     ->orWhere(['slug', 'like', '%' . $keyword . '%'])->paginate(10);

        return view('admin.user.index',
        [
            'data' => $data
        ]);
    }

}


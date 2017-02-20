<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Book;
class BookController extends Controller
{
    public function index()
	{
	    return view('home/book/index')->withBooks(Book::all());
	}
    public function create()
    {
        return view('home/book/create');
    }
    public function store(Request $request) // Laravel 的依赖注入系统会自动初始化我们需要的 Request 类
    {
        // 数据验证
        $this->validate($request, [
            'list' => 'required|unique:books|max:255', // 必填、在 articles 表中唯一、最大长度 255
            'name' => 'required', // 必填
        ]);

        // 通过 Article Model 插入一条数据进 articles 表
        $book = new Book; // 初始化 book 对象
        $book->list = $request->get('list'); // 将 POST 提交过了的 title 字段的值赋给 book 的 title 属性
        $book->name = $request->get('name'); // 同上
        $book->qihao = $request->get('qihao'); // 同上
        $book->book = $request->get('book'); // 同上
        // $book->user_id = $request->user()->id; // 获取当前 Auth 系统中注册的用户，并将其 id 赋给 book 的 user_id 属性

        // 将数据保存到数据库，通过判断保存结果，控制页面进行不同跳转
        if ($book->save()) {
            return redirect('home/book'); // 保存成功，跳转到 文章管理 页
        } else {
            // 保存失败，跳回来路页面，保留用户的输入，并给出提示
            return redirect()->back()->withInput()->withErrors('保存失败！');
        }
    }

    public function edit($id)
    {
        return view('home/book/edit')->withBook(Book::find($id));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'list' => 'required|unique:books|max:255',
            'qihao' => 'required', 
            'name' => 'required', 
            'book' => 'required', 
        ]);
        // var_dump($request);die();
        $book = Book::find($id);
        $book->list = $request->get('list'); // 将 POST 提交过了的 title 字段的值赋给 book 的 title 属性
        $book->name = $request->get('name'); // 同上
        $book->qihao = $request->get('qihao'); // 同上
        $book->book = $request->get('book'); // 同上
        if ($book->save()) {
            return redirect('home/book');
        } else {
            return redirect()->back()->withInput()->withErrors('更新失败！');//返回报错
        }
    }
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->back()->withInput()->withErrors('删除成功！');
    }
}

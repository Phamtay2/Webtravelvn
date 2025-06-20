<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }
    public function login()
    {
        return view('auth.login');
    }

    public function check_login(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users',
        'password' => 'required'
    ]);

    $data = $request->only('email','password');

    if(auth()->attempt($data)) {
        // Sau khi đăng nhập thành công, kiểm tra role
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin')->with('ok', 'Đăng nhập với vai trò admin');
        } else {
            return redirect()->route('hom')->with('ok', 'Đăng nhập thành công');
        }
    }

    return redirect()->back()->with('no', 'Email hoặc mật khẩu không đúng');
}


    public function register()
    {
        if(auth()->check()){
            return redirect()->route('hom')->with('ok','You are logged in');
        }
        return view('auth.register');
    }

    public function check_register(Request $request)
    {
         $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'confirm_password' => 'required|same:password',
         ],
         [
                
               
                
        ]
    );

    $data = $request->only('email','name');
    $data['password'] = bcrypt($request->password);
    $user = User::create($data);

    // Gán role mặc định


    return redirect()->route('user.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('user.login')->with('ok','You are logged out');
    }
    

    // Hiển thị form chỉnh sửa user
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Xử lý cập nhật user
    public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $id,
        'role' => 'required|in:admin,editor,categoryMng,tourMng,viewer',
    ]);

    $user = User::findOrFail($id);

    // Nếu user này hiện tại đang là admin
    if ($user->role === 'admin') {
        // Kiểm tra nếu request role không phải admin thì chặn (hạ quyền)
        if ($request->role !== 'admin') {
            return back()->withErrors(['role' => 'Không thể hạ quyền admin hiện tại.']);
        }
    }

    // Kiểm tra giới hạn chỉ 1 admin
    if ($request->role === 'admin') {
        $existingAdmin = User::where('role', 'admin')->where('id', '!=', $id)->first();
        if ($existingAdmin) {
            return back()->withErrors(['role' => 'Chỉ được phép có một admin duy nhất trong hệ thống.']);
        }
    }

    $user->name = $request->name;
    $user->email = $request->email;
    $user->role = $request->role;
    $user->save();

    return redirect()->route('users.index')->with('success', 'Cập nhật người dùng thành công');
}



    // Xóa user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Xóa user thành công');
    }
}

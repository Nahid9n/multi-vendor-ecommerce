<?php

namespace App\Http\Controllers;

use App\Models\BlogComment;
use App\Models\BlogCommentReply;
use Brian2694\Toastr\Toastr;
use Illuminate\Http\Request;
use Exception;

class BlogCommentController extends Controller
{
    public function comment(Request $request){
        try {
            $this->validate($request,[
                'blog_id' => 'required',
                'comment' => 'required',
            ]);
            $blogComment = new BlogComment();
            $blogComment->blog_id = $request->blog_id;
            $blogComment->comment = $request->comment;
            $blogComment->user_id = auth()->user()->id;
            $blogComment->save();
            toastr()->success('Comment Success.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function commentEdit(Request $request,$id){
        try {
            $this->validate($request,[
                'blog_id' => 'required',
                'comment' => 'required',
            ]);
            $blogComment = BlogComment::find($id);
            $blogComment->blog_id = $request->blog_id;
            $blogComment->comment = $request->comment;
            $blogComment->user_id = auth()->user()->id;
            $blogComment->save();
            toastr()->success('Comment Update Success.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function commentDelete(Request $request){

        try {
            $blogComment = BlogComment::find($request->comment_id);
            $blogComment->delete();
            toastr()->success('comment delete success.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function reply(Request $request){
        try {
            $this->validate($request,[
                'blog_id' => 'required',
                'comment_id' => 'required',
                'reply' => 'required',
            ]);
            $blogComment = new BlogCommentReply();
            $blogComment->blog_id = $request->blog_id;
            $blogComment->comment_id = $request->comment_id;
            $blogComment->user_id = auth()->user()->id;
            $blogComment->reply = $request->reply;
            $blogComment->save();
            toastr()->success('Reply Success.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function editReply(Request $request,$id){
        try {
            $this->validate($request,[
                'blog_id' => 'required',
                'comment_id' => 'required',
                'reply' => 'required',
            ]);
            $reply = BlogCommentReply::find($id);
            $reply->blog_id = $request->blog_id;
            $reply->comment_id = $request->comment_id;
            $reply->user_id = auth()->user()->id;
            $reply->reply = $request->reply;
            $reply->save();
            toastr()->success('Reply Success.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
    public function replyDelete(Request $request){
        try {
            $reply = BlogCommentReply::find($request->reply_id);
            $reply->delete();
            toastr()->success('reply delete success.');
            return back();
        }
        catch (Exception $e){
            toastr()->error($e->getMessage());
            return back();
        }
    }
}

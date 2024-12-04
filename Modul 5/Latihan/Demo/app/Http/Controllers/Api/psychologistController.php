<?php

namespace App\Http\Controllers\Api;

//import model Post
use App\Models\Post;

use Illuminate\Http\Request;

//import resource PostResource
use App\Http\Controllers\Controller;

//import Http request
use App\Http\Resources\PsychologistResource;
use App\Models\psychologist;
//import facade Validator
use Illuminate\Support\Facades\Validator;

//import facade Storage
use Illuminate\Support\Facades\Storage;

class psychologistController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get all posts
        $posts = psychologist::all();

        //return collection of posts as a resource
        return new PsychologistResource(true, 'List Data Posts', $posts);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        //define validation rules
        $validator = Validator::make($request->all(), [
            'name'              => 'required',
            'specialization'    => 'required',
            'bio'               => 'required',
            'contact'           => 'required'
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        //create post
        $post = psychologist::create([
            'name'              => $request->name,
            'specialization'    => $request->specialization,
            'bio'               => $request->bio,
            'contact'           => $request->contact,
        ]);

        //return response
        return new PsychologistResource(true, 'Data Post Berhasil Ditambahkan!', $post);
    }

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show($id)
    {
        //find post by ID
        $post = psychologist::find($id);

        //return single post as a resource
        return new PsychologistResource(true, 'Detail Data Post!', $post);
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return void
     */
        public function update(Request $request, $id)
        {
            // Define validation rules
            $validator = Validator::make($request->all(), [
                'name'              => 'required',
                'specialization'    => 'required',
                'bio'               => 'required',
                'contact'           => 'required'
            ]);

            // Check if validation fails
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            // Find the post by ID
            $post = Psychologist::find($id);

            // Check if the post exists
            if (!$post) {
                return response()->json(['message' => 'Psychologist not found'], 404);
            }

            // Update the post with new data
            $post->update([
                'name'              => $request->name,
                'specialization'    => $request->specialization,
                'bio'               => $request->bio,
                'contact'           => $request->contact
            ]);

            // Return the updated post
            return new PsychologistResource(true, 'Data Post Berhasil Diubah!', $post);
        }


    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy($id)
    {

        //find post by ID
        $post = psychologist::find($id);

        //delete post
        $post->delete();

        //return response
        return new PsychologistResource(true, 'Data Post Berhasil Dihapus!', null);
    }
}
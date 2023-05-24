<?php

namespace App\Http\Livewire;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Illuminate\Support\Str;

class Posts extends Component
{
     use WithFileUploads;
    use WithPagination;
    public $showingDataModal = false;
    public $newImage;
    public $oldImage;
    public $post_title;
    
    public $post_content;
    
    public $post_status ;
  
    public $category_id ;
    public $post_date;

     public $meta_description;
      public $meta_title;
       public $meta_keywords;
    
    public $user_id;
    
    public $isEditMode = false;
  
    public $post;
  
    public $search = '';
    protected $listeners = ['render','delete']; 
    
    public function authorize()
{
    return true;
}

    public function render()
    {
       
      
   $this->authorize('manage admin');
        $categories = Category::latest()->get();
        $posts = Post::where('post_title', 'like', '%'.$this->search.'%')->where('posts.post_status', '=', 'ACTIVE')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->select( 'posts.*','categories.category_name')
            ->orderBy('posts.id','DESC')->paginate(10);

            
       return view('livewire.posts', ['posts' => $posts,'categories' => $categories]);
    }

    public function CleanUp()  // FUNCTION CLEAN LIVEWIRE-TMP
    {
   
      $oldfiles= Storage::disk('local');
      foreach ($oldfiles->allFiles('livewire-tmp') as $file)
      {
        $yest=now()->timestamp;
       
        if ($yest > $oldfiles->lastModified($file)) {

            $oldfiles->delete($file);
        }
         
         
      }
  
  }

 public function showDataModal()
    {
        $this->reset();
        $this->showingDataModal = true;
    }
public function closeModal()
    {
          $this->showingDataModal = false;
    }

      public function storeData()
    {
           $this->authorize('manage admin');
         $valid_data = $this->validate([
        'post_title' => 'required|unique:posts|min:3|max:100',
        'post_content' => 'required|min:3|max:1000',
        'newImage' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        'post_status' => 'required',
      
        'category_id' => 'required',
       'meta_description' => 'required|unique:posts|min:3|max:200',
       'meta_title' => 'required|unique:posts|min:3|max:200',
       'meta_keywords' => 'required|min:3|max:200',
      ]);

        $image = $this->newImage->store('posts', 'public');
            // Create a thumbnail of the image using Intervention Image Library
             $imageHashName = $this->newImage->hashName();

            $resize = new ImageManager();
            $ImageManager = $resize->make('storage/posts/'.$imageHashName)->resize(900, 300);
            $ImageManager->save('storage/posts/'.$imageHashName);
             // END UPLOAD WITH INTERVENTION IMAGE

              // CARBON FORMAT DATE
         $date = Carbon::now()->locale('en')->isoFormat('dddd, MMMM Do YYYY, H:mm A');
            // END CARBON FORMAT DATE

        Post::create([
            'post_title' => $this->post_title,
            'post_content' => $this->post_content,
            'post_image' => $image,
            'post_status' => $this->post_status,
            'post_date' => $date,
             'user_id' => auth()->user()->id,
            'category_id' => $this->category_id,
            'meta_description' => $this->meta_description,
            'meta_title' => $this->meta_title,
            'meta_keywords' => $this->meta_keywords,
            'post_title_slug' => Str::slug($this->post_title),
        ]); session()->flash("message", "Data registration successfully.");
        $this->reset();
         $this->CleanUp();
        sleep(2); //BUTTON SPINNER LOADING
    }

    public function showEditDataModal($id)
    {
           $this->authorize('manage admin');
        $this->post = Post::findOrFail($id);
        $this->post_title = $this->post->post_title;
        $this->post_content = $this->post->post_content;
        $this->post_status = $this->post->post_status;
        $this->category_id = $this->post->category_id;
        $this->oldImage = $this->post->post_image;
         $this->meta_description = $this->post->meta_description;
          $this->meta_title = $this->post->meta_title;
           $this->meta_keywords = $this->post->meta_keywords;
        $this->isEditMode = true;
        $this->showingDataModal = true;
    }

     public function updateData()
    {
           $this->authorize('manage admin');
        
        $this->validate([
            'post_title' => 'required|string|min:3|max:100|unique:posts,post_title,'.$this->post->id.',id',
           'post_content' => 'required|min:3|max:1000',
             'post_status' => 'required|min:3|max:200',
             'category_id' => 'required',
            'meta_description' => 'required|string|min:3|max:200|unique:posts,meta_description,'.$this->post->id.',id',
            'meta_title' => 'required|string|min:3|max:200|unique:posts,meta_title,'.$this->post->id.',id',
           'meta_keywords' => 'required|min:3|max:200',
            
        ]);
        $image = $this->post->post_image;
         if ($this->newImage) {
              Storage::disk('public')->delete($image);
           
            $image = $this->newImage->store('posts', 'public');
            
             // Create a thumbnail of the image using Intervention Image Library
             $imageHashName = $this->newImage->hashName();

            $resize = new ImageManager();
            $ImageManager = $resize->make('storage/posts/'.$imageHashName)->resize(900, 400);
            $ImageManager->save('storage/posts/'.$imageHashName);
             // END UPLOAD WITH INTERVENTION IMAGE
        }

        $this->post->update([
            'post_title' => $this->post_title,
            'post_content' => $this->post_content,
             'post_image' => $image,
            'post_status' => $this->post_status,
            'category_id' => $this->category_id,
             'meta_description' => $this->meta_description,
              'meta_title' => $this->meta_title,
               'meta_keywords' => $this->meta_keywords,
               'post_title_slug' => Str::slug($this->post_title),
        ]); session()->flash("message", "Data Updated Successfully.");
        $this->reset();
         $this->CleanUp();
         sleep(2); //BUTTON SPINNER LOADING
    }


    public function delete(Post $post)
    {
           $this->authorize('manage admin');
        $post->delete();
          Storage::disk('public')->delete($post->post_image);
      
      
     
    }

   
public function renderPost()
{
   $data = $this->renderPosts(); // Llamada a la función renderPosts() para obtener los datos

   return view('livewire.blog-section', $data); // Devolver la vista 'dashboard' con los datos
}

public function renderPosts()
{
   $categories = Category::latest()->get();
   $posts = Post::where('post_title', 'like', '%'.$this->search.'%')
      ->where('posts.post_status', '=', 'ACTIVE')
      ->join('categories', 'categories.id', '=', 'posts.category_id')
      ->select('posts.*', 'categories.category_name')
      ->orderBy('posts.id', 'DESC')
      ->paginate(10);
      
// Convertir el campo post_date al nuevo formato deseado
        foreach ($posts as $post) {
            $post->post_date = Carbon::parse($post->created_at)->format('F d, Y');
        }

   return [
      'posts' => $posts,
      'categories' => $categories
   ];
}

public function showPost($id)
{
    $posts = Post::findOrFail($id);
   return view('livewire.showpost',['posts' => $posts]);
}


}

?>

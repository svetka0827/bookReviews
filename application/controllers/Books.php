<?php
defined('BASEPATH') OR exit('No direct script access allowed');




class Books extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Book');
		$this->load->library('upload');
		$this->load->helper(array('form', 'url'));

	}


	public function index()
	{
		$genres=$this->Book->all_genres();
		$data=array(
				'genres'=>$genres
				);
		$this->load->view('index',$data);
	}

	public function view_book($book_id)
	{

		$book_reviews=$this->Book->book_reviews($book_id);
		$book_info=$this->Book->single_book_review_count($book_id);
		$rating_average=$this->Book->rating_average($book_id);

		$data=array(
			'book_reviews'=>$book_reviews,
			'book_info'=>$book_info,
			'rating_average'=>$rating_average
			);	

		$this->load->view('view_book',$data);
	}

	public function recent_reviews_load()
	{
		$recent_reviews=$this->Book->recent_reviews();
		$reviews_count=$this->Book->book_review_count();

		$data=array(
			'recent_reviews'=>$recent_reviews,
			'reviews_count'=>$reviews_count
			);	
		$this->load->view('partials/recent_reviews',$data);
	}


	public function reviews_by_category($category_id)
	{
		$reviews_bycategory=$this->Book->reviews_by_category($category_id);
		$reviews_count=$this->Book->book_review_count();

		$data=array(
			'reviews_bycategory'=>$reviews_bycategory,
			'reviews_count'=>$reviews_count
			);
		$this->load->view('partials/reviews_bycategory',$data);
	}



	public  function post_review()
	{
		$authors=$this->Book->all_authors();
		$genres=$this->Book->all_genres();
		$types=$this->Book->all_types();
		$data=array(
			'authors'=>$authors,
			'genres'=>$genres,
			'types'=>$types
			);
		$this->load->view('add_review',$data);
	}


	public function existing_book_review()
	{
		$this->load->view('add_review');
	}



	public function add_book_and_review()
	{
		$post=$this->input->post();


		
		// //checking if picture uploaded
        // if(!empty($FILES['picture']['name']))
        // {
        // 	$config['upload_path']   = './uploads/';
        //     $config['allowed_types'] = 'gif|jpg|png|jpeg';
        //     $config['file_name']=$_FILES['picture']['name'];
        //     // $config['max_size']   = 100;
        //     // $config['max_width']  = 1024;
        //     // $config['max_height'] = 768;

        //     //Load library and initialize configurations
        //     $this->load->library('upload',$config);
        //     $this->upload->initialize($config);

        //     if($this->upload->do_upload('picture'))
        //     {
        //     	$uploadData=$this->upload->data();
        //     	$picture=$uploadData['file_name'];
        //     }
        //     else
        //     {
        //     	$picture='';
        //     }
        // }

        
		if(empty($post['first_name']))
		{
			$author_id=$post['author_id'];
		}
		else
		{
			$data=array(
					'first_name'=>$post['first_name'],
					'last_name'=> $post['last_name']
					);

			$author_id=$this->Book->add_author($data);
		}
			

        	$data=array(
				'title'=>$post['title'],
				'img'=>'$picture',
				'author_id'=>$author_id,
				'type_id'=>$post['type_id'],
				);
			
			$book_id=$this->Book->add_book($data);

		
			//adding review
        	$data=array(
				'review'=>$post['review'],
				'rating'=>$post['rating'],
				'user_id'=>$this->session->userdata('user_id'),
				'book_id'=>$book_id
				);

        	$this->Book->add_review($data);




			// adding book_genres
        	$genres=$post['genre_id'];
        	$length=count($genres);


        	for($i=0; $i<$length;$i++)
        	{
        		$data=array(
        			'book_id'=>$book_id,
        			'genre_id'=>$genres[$i]
        			);
        		$this->Book->add_book_genre($data);

        	}


        	$insertUserData=$this->Book->add_review($data);

        	//Storing insertion status message
        	if($insertUserData)
        	{
        		$this->session->set_flashdata('success_msg',"Review have been added successfully.");
        	}
        	else
        	{
        		$this->session->set_flashdata('error_msg',"Unable to add review, please try again");
        	}
			
        	redirect('/Books/post_review');

	}



}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Model 
{

	public function add_author($data)
	{
		$query="INSERT INTO authors
							(first_name,
							last_name)
							VALUES (?,?)";

		$values=array(
			$data['first_name'],
			$data['last_name']
			);

		$this->db->query($query,$values);

		$author_id=$this->db->insert_id();
		return $author_id;
	}



	public function add_book($data)
	{
		$query="INSERT INTO books
						(title,
						img,
						author_id,
						type_id)
						VALUES (?,?,?,?)";

		$values=array(
			$data['title'],
			$data['img'],
			$data['author_id'],
			$data['type_id']
			);

		$this->db->query($query,$values);

		$book_id=$this->db->insert_id();
		return $book_id;
	}


	public function add_review($data)
	{
		$query="INSERT INTO reviews
						(review,
						rating,
						created_at,
						user_id,
						book_id
						)
						VALUES (?,?,NOW(),?,?)";

		$values=array(
			$data['review'],
			$data['rating'],
			$data['user_id'],
			$data['book_id']
			);

		$this->db->query($query,$values);
	}

	 public function reviews_by_category($category_id)
	 {

	 	$query="SELECT DISTINCT books.id as book_id,books.title, reviews.rating, users.name, reviews.review,reviews.created_at, book_genres.genre_id
			FROM book_genres
            JOIN books on book_genres.book_id=books.id
			JOIN reviews ON books.id = reviews.book_id
			JOIN users ON reviews.user_id = users.id
            WHERE genre_id=".$category_id . "
            ORDER BY created_at DESC LIMIT 3";

			return $this->db->query($query)->result_array();	
	 }

	 public function recent_reviews()
	 {
	 		$query="SELECT DISTINCT books.id as book_id,books.title, reviews.rating, users.name, reviews.review,reviews.created_at
			FROM books
			JOIN reviews ON books.id = reviews.book_id
			JOIN users ON reviews.user_id = users.id
			ORDER BY books.id DESC limit 5";

			return $this->db->query($query)->result_array();
	 }


 	public function all_authors()
 	{
 		$query="SELECT * FROM authors";
		return $this->db->query($query)->result_array();
 	}

 	public function all_types()
 	{
 		$query="SELECT * FROM types";
		return $this->db->query($query)->result_array();

 	}

 	public function all_genres()
 	{
  		$query="SELECT * FROM genres";
		return $this->db->query($query)->result_array();

 	}


 	public function book_review_count()
 	{
  		$query="SELECT book_id ,count(book_id) as number_of_reviews 
				from reviews
				group by book_id";
		return $this->db->query($query)->result_array();
 	}


 	public function book_reviews($book_id)
 	{
 		$query="SELECT books.id as book_id,books.title, reviews.rating, users.name, reviews.review,reviews.created_at, book_genres.genre_id
			FROM book_genres
            JOIN books on book_genres.book_id=books.id
			JOIN reviews ON books.id = reviews.book_id
			JOIN users ON reviews.user_id = users.id
            Where books.id=" . $book_id . "
            group by users.id";
		return $this->db->query($query)->result_array();
 	}

 	public function single_book_review_count($book_id)
 	{
  		$query="SELECT count(review) as reviews_count, books.title, authors.first_name,authors.last_name
			from reviews
			JOIN books on books.id=reviews.book_id
			JOIN authors on authors.id=books.author_id
			where book_id=" . $book_id;
		return $this->db->query($query)->row_array();
 	}

 	public function rating_average($book_id)
 	{
  		$query="SELECT ROUND(avg(rating),1) as average
			from reviews
			where book_id=" . $book_id;
		return $this->db->query($query)->row_array();

 	}


 	public function user_reviews($user_id)
 	{

        $query="SELECT books.id as book_id,books.title, reviews.rating, users.name, reviews.review,reviews.created_at, users.email
			FROM books
			JOIN reviews ON books.id = reviews.book_id
			JOIN users ON reviews.user_id = users.id
            Where users.id=" . $user_id;
            
		return $this->db->query($query)->result_array();

 	}


 	public function add_book_genre($data)
 	{
		$query="INSERT INTO book_genres
						(book_id,
						genre_id)
						VALUES (?,?)";

		$values=array(
			$data['book_id'],
			$data['genre_id']
			);

		$this->db->query($query,$values);

 	}

}
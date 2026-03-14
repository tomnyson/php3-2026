<h2>Create Product</h2>

<form method="POST" action="/products">
@csrf

<input type="text" name="name" placeholder="Product name">

<input type="number" name="price" placeholder="Price">

<textarea name="description"></textarea>

<button type="submit">Save</button>

</form>
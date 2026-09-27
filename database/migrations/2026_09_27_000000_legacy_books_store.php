<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
 public function up(): void {
  if (!Schema::hasTable('users')) Schema::create('users', function(Blueprint $t){$t->increments('id');$t->string('name',160);$t->string('email',190)->unique();$t->string('password');$t->string('role',20)->default('user');$t->rememberToken();$t->timestamps();});
  if (!Schema::hasTable('categories')) Schema::create('categories',function(Blueprint $t){$t->increments('id');$t->string('name',190);});
  if (!Schema::hasTable('books')) Schema::create('books',function(Blueprint $t){$t->increments('id');$t->string('title',255);$t->string('author',255);$t->text('description')->nullable();$t->decimal('price',10,2)->default(0);$t->decimal('rating',2,1)->default(0);$t->string('image',255)->nullable();$t->unsignedInteger('stock')->default(0);$t->unsignedInteger('category_id')->nullable();$t->unsignedInteger('publisher_id')->nullable();$t->string('purchase_location',255)->nullable();$t->timestamps();});
  if (!Schema::hasTable('orders')) Schema::create('orders',function(Blueprint $t){$t->increments('id');$t->unsignedInteger('user_id');$t->string('customer_name',160);$t->string('customer_email',190);$t->string('whatsapp',30);$t->text('address');$t->decimal('total',10,2)->default(0);$t->string('payment_method',40)->default('instapay');$t->string('payment_reference',120)->nullable();$t->string('status',30)->default('pending');$t->timestamps();$t->index('user_id');$t->index('status');});
  if (!Schema::hasTable('order_items')) Schema::create('order_items',function(Blueprint $t){$t->increments('id');$t->unsignedInteger('order_id');$t->unsignedInteger('book_id');$t->string('title',255);$t->decimal('price',10,2);$t->unsignedInteger('quantity');$t->index('order_id');$t->index('book_id');});
  if (!Schema::hasTable('book_access')) Schema::create('book_access',function(Blueprint $t){$t->increments('id');$t->unsignedInteger('user_id');$t->unsignedInteger('book_id');$t->unsignedInteger('granted_by')->nullable();$t->timestamps();$t->unique(['user_id','book_id']);});
  if (!Schema::hasTable('book_comments')) Schema::create('book_comments',function(Blueprint $t){$t->increments('id');$t->unsignedInteger('book_id');$t->unsignedInteger('user_id');$t->text('body');$t->timestamps();$t->index('book_id');$t->index('user_id');});
  if (!Schema::hasTable('publishers')) Schema::create('publishers',function(Blueprint $t){$t->increments('id');$t->string('name',190)->unique();$t->timestamp('created_at')->useCurrent();});
  if (!Schema::hasTable('book_ratings')) Schema::create('book_ratings',function(Blueprint $t){$t->increments('id');$t->unsignedInteger('book_id');$t->unsignedInteger('user_id');$t->unsignedTinyInteger('rating');$t->timestamp('created_at')->useCurrent();$t->unique(['book_id','user_id']);});
  if (!Schema::hasTable('points_ledger')) Schema::create('points_ledger',function(Blueprint $t){$t->increments('id');$t->unsignedInteger('user_id');$t->string('event_key',120);$t->integer('points');$t->string('label',160);$t->timestamp('created_at')->useCurrent();$t->unique(['user_id','event_key']);});
  // Compatibility columns for an existing database.
  $columns=['rating'=>['type'=>'decimal','args'=>[2,1]],'purchase_location'=>['type'=>'string','args'=>[255]],'publisher_id'=>['type'=>'unsignedInteger','args'=>[]]];
  foreach($columns as $column=>$meta){ if(!Schema::hasColumn('books',$column)){ Schema::table('books',function(Blueprint $t)use($column,$meta){$type=$meta['type'];$args=$meta['args'];$t->$type($column,...$args)->nullable();}); } }
 }
 public function down(): void {}
};
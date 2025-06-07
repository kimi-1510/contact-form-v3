<?php

namespace Database\Factories;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class InquiryFactory extends Factory
{
    // Inquiryモデルが実際にcontactsテーブルを使用するなら、
    // Inquiryモデル内で protected $table = 'contacts'; と指定されているはずです。
    protected $model = Inquiry::class;

    public function definition()
    {
        return [
            // category_id は、Category ファクトリがあれば下記のように紐付けるか、
            // すでにデータがある場合はランダムな既存ID (例: 1〜3) を代入する方法もあります。
            'category_id' => \App\Models\Category::factory(), // もしくは $this->faker->numberBetween(1, 3)
            'first_name'  => $this->faker->firstName,
            'last_name'   => $this->faker->lastName,
            // tinyIntegerなので数値をそのまま指定（1, 2, or 3）
            'gender'      => $this->faker->randomElement([1, 2, 3]),
            'email'       => $this->faker->unique()->safeEmail,
            'tel'         => $this->faker->phoneNumber,
            'address'     => $this->faker->address,
            // buildingはnullableなのでoptional()で生成するか、nullを入れることも可能
            'building'    => $this->faker->optional()->secondaryAddress,
            'detail'      => $this->faker->paragraph,
        ];
    }
}
// このファクトリは、Inquiryモデルのデータを生成するために使用されます。
// 例えば、テストやシーディングの際に、以下のように使用できます。
// Inquiry::factory()->count(10)->create();
// これにより、10件のInquiryデータがランダムに生成され、contactsテーブルに挿入されます。
// また、特定のデータを生成したい場合は、以下のように個別に指定することも可能です。
// Inquiry::factory()->create([
//     'first_name' => 'John',
//     'last_name'  => 'Doe',
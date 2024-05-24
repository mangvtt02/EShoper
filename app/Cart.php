<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public $items;

    public function __construct()
    {
        // Khởi tạo giỏ hàng từ session
        $this->items = session('cart');
    }

    public function add($data, $quantity = 1)
    {
<<<<<<< HEAD
        if ($quantity <= 0) {
            return 'Số lượng sản phẩm phải lớn hơn 0';
        }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
        if (isset($this->items[$data['id']])) {
            // Lấy số lượng hiện tại của sản phẩm trong giỏ hàng
            $currentQuantity = $this->items[$data['id']]['quantity'];
<<<<<<< HEAD
            
            // Tính tổng số lượng mới sau khi thêm vào giỏ hàng
            $newQuantity = $currentQuantity + $quantity;
            
            // Kiểm tra số lượng sản phẩm trong kho
            if ($data['storage_quantity'] < $quantity) {
                // Nếu hết hàng, trả về thông báo
                return 'Sản phẩm tạm hết hàng.';
            } else {
                // Cập nhật số lượng trong giỏ hàng
=======
    
            // Tính tổng số lượng mới sau khi thêm vào giỏ hàng
            $newQuantity = $currentQuantity + $quantity;
    
            // Kiểm tra xem số lượng mới có lớn hơn lượng hàng trong kho không
            if ($newQuantity > $data['storage_quantity']) {
                // Nếu lớn hơn, trả về thông báo
                return 'Sản phẩm tạm hết hàng.';
            } else {
                // Nếu không, cập nhật số lượng trong giỏ hàng
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $this->items[$data['id']]['quantity'] = $newQuantity;
                
                // Cập nhật số lượng trong kho
                $product = Product::find($data['id']);
                $product->storage_quantity -= $quantity; // Trừ đi số lượng nhập vào từ storage_quantity
                $product->save();
            }
        } else {
<<<<<<< HEAD
            // Kiểm tra số lượng sản phẩm trong kho
            if ($data['storage_quantity'] == 0) {
                // Nếu hết hàng, trả về thông báo
                return 'Sản phẩm tạm hết hàng.';
            } else {
                // Nếu sản phẩm chưa có trong giỏ hàng, thêm vào giỏ hàng
                $this->items[$data['id']] = $data;
                $this->items[$data['id']]['quantity'] = $quantity;
                
                // Cập nhật số lượng trong kho
                $product = Product::find($data['id']);
                $product->storage_quantity -= $quantity; // Trừ đi số lượng nhập vào từ storage_quantity
                $product->save();
            }
=======
            // Nếu sản phẩm chưa có trong giỏ hàng, thêm vào giỏ hàng
            if ($quantity > $data['storage_quantity']) {
                // Kiểm tra số lượng mới với lượng hàng trong kho
                return 'Sản phẩm tạm hết hàng.';
            }
            $this->items[$data['id']] = $data;
            $this->items[$data['id']]['quantity'] = $quantity;
            
            // Cập nhật số lượng trong kho
            $product = Product::find($data['id']);
            $product->storage_quantity -= $quantity; // Trừ đi số lượng nhập vào từ storage_quantity
            $product->save();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
        
        // Lưu giỏ hàng vào session
        session(['cart' => $this->items]);
<<<<<<< HEAD
    }
=======
    }    
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    public function delete_cart($id)
    {
        // Kiểm tra sản phẩm có tồn tại trong giỏ hàng không
        if (isset($this->items[$id])) {
            // Lấy số lượng sản phẩm được xóa
            $quantityDeleted = $this->items[$id]['quantity'];
            // Nếu tồn tại, trả lại số lượng sản phẩm vào storage_quantity và xóa sản phẩm khỏi giỏ hàng
            $this->items[$id]['storage_quantity'] += $quantityDeleted;
            unset($this->items[$id]);
            // Cập nhật giỏ hàng trong session
            session(['cart' => $this->items]);
            // Cập nhật storage_quantity vào session
            session(['storage_quantity' => isset($this->items[$id]['storage_quantity']) ? $this->items[$id]['storage_quantity'] : 0]);

            // Trả lại số lượng sản phẩm vào kho
            $product = Product::find($id);
            $product->storage_quantity += $quantityDeleted;
            $product->save();

            return true;
        } else {
            // Nếu không tồn tại, trả về false
            return false;
        }
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng
    public function update_carts($id, $quantity)
    {
        // Kiểm tra số lượng mới có hợp lệ không
        $quantity = is_numeric($quantity) ? $quantity : 1;
        $quantity = $quantity > 0 ? ceil($quantity) : 1;
        
        // Kiểm tra sản phẩm có tồn tại trong giỏ hàng không
        if (isset($this->items[$id])) {
            // Lấy số lượng sản phẩm trước khi cập nhật
            $oldQuantity = $this->items[$id]['quantity'];
            // Kiểm tra lượng hàng trong kho, nếu không đủ, trả về thông báo
            if ($quantity > $this->items[$id]['storage_quantity'] + $oldQuantity) {
                return 'Sản phẩm tạm hết hàng.';
            }
            // Nếu đủ, cập nhật số lượng sản phẩm và lưu vào session
            $this->items[$id]['quantity'] = $quantity;
            // Cập nhật lại storage_quantity
            $this->items[$id]['storage_quantity'] += ($oldQuantity - $quantity);
            session(['cart' => $this->items]);
        }
    }

    // Xóa toàn bộ giỏ hàng
    public function clear_cart()
{
    // Kiểm tra nếu giỏ hàng không rỗng
    if (!empty($this->items)) {
        // Duyệt qua từng sản phẩm trong giỏ hàng
        foreach ($this->items as $id => $item) {
            // Trả lại số lượng sản phẩm vào storage_quantity
            $product = Product::find($id);
            if ($product) {
                $product->storage_quantity += $item['quantity'];
                $product->save();
            }
        }
    }

    // Xóa toàn bộ sản phẩm trong giỏ hàng và cập nhật session
    session(['cart' => []]);
}


    // Tính tổng tiền của các sản phẩm trong giỏ hàng
    public function total()
    {
        $total = 0;

        // Duyệt qua từng sản phẩm trong giỏ hàng và tính tổng tiền
        if (count($this->items)) {
            foreach ($this->items as $item) {
                $total += ($item['quantity'] * ($item['unit_price'] - ($item['unit_price'] * $item['discount']) / 100));
            }
        }
        
        return $total;
    }
}
?>

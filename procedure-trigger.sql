DELIMITER //

CREATE PROCEDURE CapNhatTrangThaiPhim()
BEGIN
    DECLARE ngayHienTai DATE;
    
    -- Lấy ngày hiện tại
    SET ngayHienTai = CURDATE();
    
    -- Cập nhật trạng thái của phim dựa trên NgayPhatHanh so với ngày hiện tại, nếu trạng thái hiện tại không là 3
    UPDATE Phim
    SET TrangThai = CASE
        WHEN NgayPhatHanh > ngayHienTai THEN 2  -- Ngày phát hành sau ngày hiện tại, trạng thái là 2
        ELSE 1                                  -- Ngày phát hành trước hoặc bằng ngày hiện tại, trạng thái là 1
    END
    WHERE TrangThai != 3; -- Chỉ cập nhật nếu TrangThai không phải là 3
    
END //

DELIMITER ;


DELIMITER //

CREATE TRIGGER CapNhatTrangThaiPhim_Insert
AFTER INSERT ON Phim
FOR EACH ROW
BEGIN
    -- Gọi thủ tục CapNhatTrangThaiPhim
    CALL CapNhatTrangThaiPhim();
END //

DELIMITER ;

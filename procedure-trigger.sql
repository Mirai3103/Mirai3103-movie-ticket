DELIMITER / /

CREATE PROCEDURE CapNhatTrangThaiPhim() 
BEGIN 
DECLARE
	ngayHienTai DATE;
	-- Lấy ngày hiện tại
	SET ngayHienTai = CURDATE();
	-- Cập nhật trạng thái của phim dựa trên NgayPhatHanh so với ngày hiện tại, nếu trạng thái hiện tại không là 3
	UPDATE Phim
	SET
	    TrangThai = CASE
	        WHEN NgayPhatHanh > ngayHienTai THEN 2
	        -- Ngày phát hành sau ngày hiện tại, trạng thái là 2
	        ELSE 1
	        -- Ngày phát hành trước hoặc bằng ngày hiện tại, trạng thái là 1
	    END
	WHERE
	    TrangThai ! = 3;
	-- Chỉ cập nhật nếu TrangThai không phải là 3
END
// 

DELIMITER;

DELIMITER / /

CREATE TRIGGER CapNhatTrangThaiPhim_Insert AFTER INSERT 
ON Phim FOR EACH ROW 
BEGIN 
	-- Gọi thủ tục CapNhatTrangThaiPhim
	CALL CapNhatTrangThaiPhim ();
END
// 

DELIMITER;

DELIMITER $$

CREATE PROCEDURE update_ve_gia_trang_thai_5() 
BEGIN 
DECLARE
	loai_ve_gia INT;
DECLARE
	loai_ghe_gia INT;
DECLARE
	suat_chieu_gia INT;
DECLARE
	done INT DEFAULT FALSE;
DECLARE
	ma_ve INT;
DECLARE
	ma_loai_ve INT;
DECLARE
	ma_ghe INT;
DECLARE
	ma_suat_chieu INT;
DECLARE
	cur CURSOR FOR
	SELECT v.MaVe, v.MaLoaiVe, v.MaGhe, v.MaSuatChieu
	FROM Ve v
	WHERE
	    v.TrangThai = 5;
DECLARE
	CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
	OPEN cur;
	 read_loop : LOOP FETCH cur INTO ma_ve , ma_loai_ve , ma_ghe , ma_suat_chieu;
	IF done THEN LEAVE read_loop;
END
	IF;
	-- Lấy giá vé từ bảng LoaiVe
	SELECT GiaVe INTO loai_ve_gia
	FROM LoaiVe
	WHERE
	    MaLoaiVe = ma_loai_ve;
	-- Lấy giá ghế từ bảng Ghe và LoaiGhe
	SELECT lg.GiaVe INTO loai_ghe_gia
	FROM Ghe g
	    JOIN LoaiGhe lg ON g.MaLoaiGhe = lg.MaLoaiGhe
	WHERE
	    g.MaGhe = ma_ghe;
	-- Lấy giá vé từ bảng SuatChieu
	SELECT GiaVe INTO suat_chieu_gia
	FROM SuatChieu
	WHERE
	    MaXuatChieu = ma_suat_chieu;
	-- Tính tổng giá vé
	UPDATE Ve
	SET
	    GiaVe = loai_ve_gia + loai_ghe_gia + suat_chieu_gia
	WHERE
	    MaVe = ma_ve;
END
	LOOP read_loop;
	CLOSE cur;
END$$ 

DELIMITER;

DELIMITER $$

CREATE TRIGGER update_ve_gia_khi_cap_nhat_hoa_don BEFORE 
UPDATE ON Ve FOR EACH ROW 
BEGIN 
DECLARE
	loai_ve_gia INT;
DECLARE
	loai_ghe_gia INT;
DECLARE
	suat_chieu_gia INT;
	IF NEW.TrangThai <> OLD.TrangThai
	AND NEW.TrangThai = 5 THEN
	-- Lấy giá vé từ bảng LoaiVe
	SELECT GiaVe INTO loai_ve_gia
	FROM LoaiVe
	WHERE
	    MaLoaiVe = NEW.MaLoaiVe;
	-- Lấy giá ghế từ bảng Ghe và LoaiGhe
	SELECT lg.GiaVe INTO loai_ghe_gia
	FROM Ghe g
	    JOIN LoaiGhe lg ON g.MaLoaiGhe = lg.MaLoaiGhe
	WHERE
	    g.MaGhe = NEW.MaGhe;
	-- Lấy giá vé từ bảng SuatChieu
	SELECT GiaVe INTO suat_chieu_gia
	FROM SuatChieu
	WHERE
	    MaXuatChieu = NEW.MaSuatChieu;
	-- Tính tổng giá vé
	SET NEW.GiaVe = loai_ve_gia + loai_ghe_gia + suat_chieu_gia;
END
	IF;
END$$ 

DELIMITER;

-- Q: 글에 종류는????
-- 	1. page : 어드민이 올린 글. public한 글
--	2. article : 일반인이 올린 글 
--	
-- 	Q: 이미지 파일 올리는 플로우
-- 	Q: article에서도 이미지 첨부??
--	Q: 글 순서중 top으로 올리는 구분자는?


create table article (
	id int,
	type int, -- FAQ, Q&A :(What the hell?) , 캐나다 이민정보
	level int, -- 리스트에서 그룹 순위
	wdate date,	-- 기록 시간
	access_cnt int,
	title varchar(200),
	content text
)

create table comment (
	id int,
	aid int,	-- article id
	content text
)

-- file은 첨부파일 또는 이미지 파일
-- 쓰인는 용도가 다름.
create table file (
	id int,
	title varchar(100),
	url varchar(200)
)



-- Q: board_email, board_pwd, board_tel 은 뭐냐?
CREATE TABLE open_board
(
	board_idx int(10),
	board_country varchar(1),
	board_title varchar(200),
	board_content text,
	board_readnum int(10),
	board_file1 varchar(200),
	board_file2 varchar(200),
	board_img1 varchar(200),
	board_img2 varchar(200),
	board_use varchar(1),
	board_gubun varchar(50),
	board_dept1 int(10),
	board_dept2 int(10),
	board_dept3 int(10),
	board_insertday varchar(10), 
	board_write varchar(10),
	board_email varchar(200),
	board_pwd varchar(50),
	board_top varchar(1),
	board_tel varchar(20)
)

CREATE TABLE VisaAdmins
(
	adminId varchar(30),
	adminPw varchar(30),
	adminName varchar(50),
	partName varchar(50),
	phone varchar(30),
	useFlag char(1),
	regDate datetime,
	menuPower varchar(2000),
	email varchar(50)
)

CREATE TABLE open_comment
(
	idx int(10),
	bidx int(10),
	usrname varchar (50),
	usepwd varchar (50),
	content text
)



SELECT * FROM open_board where board_idx = 'pid'
SELECT * FROM open_board where board_idx = 'BOARD_dept1'
update open_board set BOARD_READNUM = BOARD_READNUM + 1  where board_idx = 'pid';
SELECT * FROM open_comment where idx='"&board_idx&"'





















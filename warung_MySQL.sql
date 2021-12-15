/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     13/12/2021 17:52:40                          */
/*==============================================================*/


/*==============================================================*/
/* Table: barang                                                */
/*==============================================================*/
create table barang
(
   id_kategori          int not null,
   id_barang            int not null,
   nama_barang          varchar(50),
   stok                 int,
   harga                int,
   primary key (id_kategori, id_barang)
);

/*==============================================================*/
/* Table: kategori                                              */
/*==============================================================*/
create table kategori
(
   id_kategori          int not null,
   bar_id_kategori      int,
   id_barang            int,
   attribute_16         varchar(25),
   primary key (id_kategori)
);

/*==============================================================*/
/* Table: pembeli                                               */
/*==============================================================*/
create table pembeli
(
   id_pembeli           int not null,
   nama                 varchar(30) not null,
   alamat               varchar(100),
   no_telepon           int not null,
   username             varchar(25),
   password             varchar(10),
   primary key (id_pembeli)
);

/*==============================================================*/
/* Table: transaksi                                             */
/*==============================================================*/
create table transaksi
(
   id_transaksi         int not null,
   id_pembeli           int,
   id_kategori          int,
   id_barang            int,
   tanggal              date not null,
   keterangan           varchar(25),
   primary key (id_transaksi)
);

alter table barang add constraint FK_memiliki_4 foreign key (id_kategori)
      references kategori (id_kategori) on delete restrict on update restrict;

alter table kategori add constraint FK_memiliki_3 foreign key (bar_id_kategori, id_barang)
      references barang (id_kategori, id_barang) on delete restrict on update restrict;

alter table transaksi add constraint FK_memiliki foreign key (id_pembeli)
      references pembeli (id_pembeli) on delete restrict on update restrict;

alter table transaksi add constraint FK_memiliki_2 foreign key (id_kategori, id_barang)
      references barang (id_kategori, id_barang) on delete restrict on update restrict;


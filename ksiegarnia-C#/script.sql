USE [master]
GO
/****** Object:  Database [ksiegarnia]    Script Date: 20.01.2020 14:47:09 ******/
CREATE DATABASE [ksiegarnia]
 CONTAINMENT = NONE
 ON  PRIMARY 
( NAME = N'ksiegarnia', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\ksiegarnia.mdf' , SIZE = 8192KB , MAXSIZE = UNLIMITED, FILEGROWTH = 65536KB )
 LOG ON 
( NAME = N'ksiegarnia_log', FILENAME = N'C:\Program Files\Microsoft SQL Server\MSSQL14.MSSQLSERVER\MSSQL\DATA\ksiegarnia_log.ldf' , SIZE = 8192KB , MAXSIZE = 2048GB , FILEGROWTH = 65536KB )
GO
ALTER DATABASE [ksiegarnia] SET COMPATIBILITY_LEVEL = 140
GO
IF (1 = FULLTEXTSERVICEPROPERTY('IsFullTextInstalled'))
begin
EXEC [ksiegarnia].[dbo].[sp_fulltext_database] @action = 'enable'
end
GO
ALTER DATABASE [ksiegarnia] SET ANSI_NULL_DEFAULT OFF 
GO
ALTER DATABASE [ksiegarnia] SET ANSI_NULLS OFF 
GO
ALTER DATABASE [ksiegarnia] SET ANSI_PADDING OFF 
GO
ALTER DATABASE [ksiegarnia] SET ANSI_WARNINGS OFF 
GO
ALTER DATABASE [ksiegarnia] SET ARITHABORT OFF 
GO
ALTER DATABASE [ksiegarnia] SET AUTO_CLOSE OFF 
GO
ALTER DATABASE [ksiegarnia] SET AUTO_SHRINK OFF 
GO
ALTER DATABASE [ksiegarnia] SET AUTO_UPDATE_STATISTICS ON 
GO
ALTER DATABASE [ksiegarnia] SET CURSOR_CLOSE_ON_COMMIT OFF 
GO
ALTER DATABASE [ksiegarnia] SET CURSOR_DEFAULT  GLOBAL 
GO
ALTER DATABASE [ksiegarnia] SET CONCAT_NULL_YIELDS_NULL OFF 
GO
ALTER DATABASE [ksiegarnia] SET NUMERIC_ROUNDABORT OFF 
GO
ALTER DATABASE [ksiegarnia] SET QUOTED_IDENTIFIER OFF 
GO
ALTER DATABASE [ksiegarnia] SET RECURSIVE_TRIGGERS OFF 
GO
ALTER DATABASE [ksiegarnia] SET  DISABLE_BROKER 
GO
ALTER DATABASE [ksiegarnia] SET AUTO_UPDATE_STATISTICS_ASYNC OFF 
GO
ALTER DATABASE [ksiegarnia] SET DATE_CORRELATION_OPTIMIZATION OFF 
GO
ALTER DATABASE [ksiegarnia] SET TRUSTWORTHY OFF 
GO
ALTER DATABASE [ksiegarnia] SET ALLOW_SNAPSHOT_ISOLATION OFF 
GO
ALTER DATABASE [ksiegarnia] SET PARAMETERIZATION SIMPLE 
GO
ALTER DATABASE [ksiegarnia] SET READ_COMMITTED_SNAPSHOT OFF 
GO
ALTER DATABASE [ksiegarnia] SET HONOR_BROKER_PRIORITY OFF 
GO
ALTER DATABASE [ksiegarnia] SET RECOVERY FULL 
GO
ALTER DATABASE [ksiegarnia] SET  MULTI_USER 
GO
ALTER DATABASE [ksiegarnia] SET PAGE_VERIFY CHECKSUM  
GO
ALTER DATABASE [ksiegarnia] SET DB_CHAINING OFF 
GO
ALTER DATABASE [ksiegarnia] SET FILESTREAM( NON_TRANSACTED_ACCESS = OFF ) 
GO
ALTER DATABASE [ksiegarnia] SET TARGET_RECOVERY_TIME = 60 SECONDS 
GO
ALTER DATABASE [ksiegarnia] SET DELAYED_DURABILITY = DISABLED 
GO
EXEC sys.sp_db_vardecimal_storage_format N'ksiegarnia', N'ON'
GO
ALTER DATABASE [ksiegarnia] SET QUERY_STORE = OFF
GO
USE [ksiegarnia]
GO
/****** Object:  Table [dbo].[Autor]    Script Date: 20.01.2020 14:47:09 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Autor](
	[idAutora] [int] IDENTITY(1,1) NOT NULL,
	[imie] [nvarchar](20) NOT NULL,
	[nazwisko] [nvarchar](20) NOT NULL,
 CONSTRAINT [PK_Autor] PRIMARY KEY CLUSTERED 
(
	[idAutora] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Klient]    Script Date: 20.01.2020 14:47:09 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Klient](
	[idKlienta] [int] IDENTITY(1,1) NOT NULL,
	[imie] [varchar](50) NOT NULL,
	[nazwisko] [varchar](50) NOT NULL,
	[adres] [nvarchar](50) NOT NULL,
	[telefon] [nvarchar](12) NOT NULL,
 CONSTRAINT [PK_Klient] PRIMARY KEY CLUSTERED 
(
	[idKlienta] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Ksiazka]    Script Date: 20.01.2020 14:47:09 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Ksiazka](
	[idKsiazki] [int] IDENTITY(1,1) NOT NULL,
	[nazwa] [nvarchar](50) NOT NULL,
	[autor] [int] NOT NULL,
	[cena] [int] NOT NULL,
	[ilosc] [int] NOT NULL,
 CONSTRAINT [PK_Ksiazka] PRIMARY KEY CLUSTERED 
(
	[idKsiazki] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Uzytkowik]    Script Date: 20.01.2020 14:47:09 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Uzytkowik](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[login] [varchar](50) NOT NULL,
	[password] [nvarchar](50) NOT NULL,
	[klient] [int] NOT NULL,
	[czy_admin] [bit] NOT NULL,
 CONSTRAINT [PK_Uzytkowik] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
/****** Object:  Table [dbo].[Zamowienie]    Script Date: 20.01.2020 14:47:09 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
CREATE TABLE [dbo].[Zamowienie](
	[idZamowienia] [int] IDENTITY(1,1) NOT NULL,
	[ksiazka] [int] NOT NULL,
	[klient] [int] NOT NULL,
	[ile_sztuk] [int] NOT NULL,
	[realizacja] [bit] NOT NULL,
 CONSTRAINT [PK_Zamowienie] PRIMARY KEY CLUSTERED 
(
	[idZamowienia] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]
GO
ALTER TABLE [dbo].[Ksiazka]  WITH CHECK ADD  CONSTRAINT [FK_Ksiazka_Autor] FOREIGN KEY([autor])
REFERENCES [dbo].[Autor] ([idAutora])
GO
ALTER TABLE [dbo].[Ksiazka] CHECK CONSTRAINT [FK_Ksiazka_Autor]
GO
ALTER TABLE [dbo].[Uzytkowik]  WITH CHECK ADD  CONSTRAINT [FK_Uzytkowik_Klient] FOREIGN KEY([klient])
REFERENCES [dbo].[Klient] ([idKlienta])
GO
ALTER TABLE [dbo].[Uzytkowik] CHECK CONSTRAINT [FK_Uzytkowik_Klient]
GO
ALTER TABLE [dbo].[Zamowienie]  WITH CHECK ADD  CONSTRAINT [FK_Zamowienie_Klient] FOREIGN KEY([ksiazka])
REFERENCES [dbo].[Klient] ([idKlienta])
GO
ALTER TABLE [dbo].[Zamowienie] CHECK CONSTRAINT [FK_Zamowienie_Klient]
GO
ALTER TABLE [dbo].[Zamowienie]  WITH CHECK ADD  CONSTRAINT [FK_Zamowienie_Ksiazka] FOREIGN KEY([ksiazka])
REFERENCES [dbo].[Ksiazka] ([idKsiazki])
GO
ALTER TABLE [dbo].[Zamowienie] CHECK CONSTRAINT [FK_Zamowienie_Ksiazka]
GO
USE [master]
GO
ALTER DATABASE [ksiegarnia] SET  READ_WRITE 
GO

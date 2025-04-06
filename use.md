## 自定义参数

> 请求地址：/api

| 可选参数 | 参数含义 | 可用变量 |
| :------------: | :-------------: | :------------: |
| rand | 随机显示最近8天内的图片 | **true** or **false** |
| day | 显示指定的最近图片 | -1，0，1，2，3，4，5，6，7(0为今天，1为昨天，-1未知) |
| size | 指定获取图片大小 | 详情见下方**可用分辨率** |
| info | 获取图片json格式基础信息 | **true** or **false** |
| format | 指定图片格式 | **jpg** or **webp**, 详情见下方**图片格式注意** |

> 请注意：rand 和 day 参数不可同时使用。

## 默认参数

* rand=false
* day=0
* size=1920x1080
* info=false
* format=jpg

> /api/?rand=false&day=0&size=1920x1080&info=false&format=jpg
> 与 /api 效果相同

## 可用分辨率

* UHD (3840x2160,4596x2583等)
* 1920x1080
* 1366x768
* 1280x768
* 1024x768
* 800x600
* 800x480
* 768x1280
* 720x1280
* 640x480
* 480x800
* 400x240
* 320x240
* 240x320

> 数字中间使用小写字母 **x** ，
> 非数学符号 **×** 。

## 图片格式注意

默认使用 jpg 格式，如果在网页引用建议使用 webp 格式。

> 注意：
> 如果使用 UHD 分辨率，则只能用 jpg 格式！
> 竖屏分辨率不一定有 webp 格式！

## 请求示例
### 默认方式请求（当天）

> /api

返回值：如下图
![默认方式请求（当天）](/api)

### 获取格式为 webp 的图片 json 格式基础信息

> /api/?info=true&format=webp

返回值：
```
{
  title:Cocoa pods from Ambanja, Madagascar (© pierivb/Getty Images),
  url:https://cn.bing.com/th?id=OHR.CocoaPods_ROW3351678192_1920x1080.webp,
  link:https://www.bing.com/search?q=Cocoa+bean&form=hpcapt,
  time:20230707
}
```

### 随机请求分辨率为 UHD 的图片

> /api/?rand=true&size=UHD

返回值：如下图
![随机请求分辨率为 UHD 的图片](/api/?rand=true&size=UHD)

### 请求昨天的图片

> /api?day=1

返回值：如下图
![请求昨天的图片](/api?day=1)

### 请求昨天的，尺寸为720×1280的图片

> /api?size=720x1280&day=1

返回值：如下图  
![请求昨天的，尺寸为720×1280的图片](/api?size=720x1280&day=1)

## 自定义输出

| 可选参数 | 参数含义 | 可用变量 |
| :------------: | :-------------: | :------------: |
| rand | 是否随机显示最近8天内的图片 | **true** or **false** |
| day | 显示指定的最近图片 | -1，0，1，2，3，4，5，6，7(0为今天，1为昨天，-1未知) |
| size | 指定获取图片大小 | 详情见下方**可用分辨率** |
| info | 获取图片json格式基础信息 | **true** or **false** |

## 默认参数

* rand=false
* day=0
* size=1920x1080
* info=false

## 可用分辨率

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

## 请求示例
### 默认方式请求（当天）

> https://bing.ltya.top/api

返回值：如下图
![默认方式请求（当天）](https://bing.ltya.top/api)

### 获取图片json格式基础信息

> https://bing.ltya.top/api/?info=true

返回值：
```
{
  title:Montagnon Lake, Pyrénées-Atlantiques, France (© thieury/Adobe Stock),
  url:https://www.bing.com/th?id=OHR.LacMontagnon_ROW4166868594_1920x1080.jpg,
  link:https://www.bing.com/search?q=lac+du+montagnon+lake&form=hpcapt,
  time:20220813
}
```

### 随机请求图片

> https://bing.ltya.top/api/?rand=true

返回值：如下图
![随机请求图片](https://bing.ltya.top/api/?rand=true)

### 请求昨天的图片

> https://bing.ltya.top/api?day=1

返回值：如下图
![请求昨天的图片](https://bing.ltya.top/api?day=1)

### 请求昨天的尺寸为720×1280的图片

> https://bing.ltya.top/api?size=720x1280&day=1

返回值：如下图
![请求今天的尺寸为720×1280的图片](https://bing.ltya.top/api?size=720x1280&day=1)